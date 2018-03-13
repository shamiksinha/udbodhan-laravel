<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Model\UdbBookGroup;
use App\Model\GstRateConfig;
use App\Model\PaymentRequest;
use App\Model\UdbBookDetail;
use App\Model\UserBook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Events\SubscriptionEvent;

class BuyBookController extends Controller {
	protected $client;
	
	public function __construct(Client $client) {
		$this->client = $client;
		$this->middleware('auth');
	}
	
	public function buybooks(Request $request){		
		Log::info("Group Id=".$request->input('bookstobuy'));
		$price=UdbBookGroup::where('group_id','=',$request->input('bookstobuy'))->get()->pluck('price')->first();
		Log::info("Payable=".$price);
		$gstRate=GstRateConfig::where('deleted_at','=',null)->get()->pluck('rate')->first();
		Log::info("GST=".$gstRate);
		$gstRate=1+$gstRate;
		$doubleGst=2*$gstRate;
		$tripleGst=3*$gstRate;
		$tax=(100*(($price+$tripleGst)/(100-$doubleGst)))-$price;
		$actualPrice=$price+$tax;
		Log::info("Actual Price=".$actualPrice);
		return view('buybooks')->with(array('price'=>$price,'tax'=>$tax,'total'=>$actualPrice,'groupid'=>$request->input('bookstobuy')));
	}
	
	public function checkout(Request $request){
		Log::info("Price to pay=".$request->input('total'));
		$email=$request->input('email');
		if ($email==null){
			$email=Auth::user()->email;
		}
		$buyer=$request->input('buyer');
		if ($buyer==null){
			$buyer=Auth::user()->firstname.' '.Auth::user()->lastname;
		}
		$payload = array(
				'purpose' => 'Buy Books '.$request->input('buyer'),
				'amount' => number_format($request->input('total'),2,'.',''),
				'phone' => $request->input('phone'),
				'buyer_name' => $buyer,
				'redirect_url' => url('paymentStatus'),
				'send_email' => false,
				//'webhook' => url('instamojo/webhook/'),
				'send_sms' => false,
				'email' => $email,
				'allow_repeated_payments' => false
		);
		//Log::info('Request Headers='.implode(',',$this->client->getConfig('headers')));
		//Log::info('Payload='.implode(',',$payload));
		$response=$this->client->post('payment-requests/',['form_params'=>$payload]);
		
		
		if ($response->getStatusCode()==201) {
			$createdPaymentReq=json_decode($response->getBody()->getContents(),true)['payment_request'];
			Log::info('Response from instamojo='.implode(',',$createdPaymentReq));			
			//Log::info('Created Payment Request='.$createdPaymentReq);
			$paymentRequest=new PaymentRequest();
			$paymentRequest->payment_request_id=$createdPaymentReq['id'];
			$paymentRequest->phone=$createdPaymentReq['phone'];
			$paymentRequest->email=$createdPaymentReq['email'];
			$paymentRequest->buyer_name=$createdPaymentReq['buyer_name'];
			$paymentRequest->amount=round($request->input('total'),6);
			$paymentRequest->purpose=$createdPaymentReq['purpose'];
			$paymentRequest->status=$createdPaymentReq['status'];
			$paymentRequest->send_sms=$createdPaymentReq['send_sms'];
			$paymentRequest->send_email=$createdPaymentReq['send_email'];
			if ($createdPaymentReq['send_sms']){
				$paymentRequest->sms_status=$createdPaymentReq['sms_status'];
			}
			if ($createdPaymentReq['send_email']){
				$paymentRequest->email_status=$createdPaymentReq['email_status'];
			}
			$paymentRequest->shorturl=$createdPaymentReq['shorturl'];
			$paymentRequest->longurl=$createdPaymentReq['longurl'];
			$paymentRequest->redirect_url=$createdPaymentReq['redirect_url'];
			$paymentRequest->webhook=$createdPaymentReq['webhook'];
			$paymentRequest->payment_req_created_at=$createdPaymentReq['created_at'];
			$paymentRequest->payment_req_modified_at=$createdPaymentReq['modified_at'];
			$paymentRequest->allow_repeated_payments=$createdPaymentReq['allow_repeated_payments'];
			$paymentRequest->group_id=$request->input('groupid');
			$paymentRequest->save();
			return Redirect::to($createdPaymentReq['longurl']);
		}else{
			return abort($response->getStatusCode(),$response->getBody()->getContents());
		}
	}
	
	public function paymentStatus(Request $request){
		$paymentStatus=false;
		$paymentStatus=DB::transaction(function () use ($request,$paymentStatus) {			
			$requestParams=$request->query->all();
			$paymentId=$requestParams['payment_id'];
			$paymentRequestId=$requestParams['payment_request_id'];
			$paymentRequest=PaymentRequest::where('payment_request_id','=',$paymentRequestId)->firstOrFail();
			$paymentRequest->payment_id=$paymentId;		
			$paymentResponse=$this->client->get('payments/'.$paymentId);
			if ($paymentResponse->getStatusCode()==200){
				$payment=json_decode($paymentResponse->getBody()->getContents(),true)['payment'];
				if ($payment['status']=='Credit'){
					$paymentStatus=true;
				}
			}
			$paymentRequest->payment_status=$paymentStatus;
			$paymentRequest->save();
			$groupId=$paymentRequest->group_id;
			$udbBookGroup=UdbBookGroup::where('group_id','=',$groupId)->with('startBook')->with('endBook')->firstOrFail();
			$startBook=$udbBookGroup->startBook->book_id;
			$endBook=$udbBookGroup->endBook->book_id;
			Log::info($groupId);
			Log::info($startBook);
			Log::info($endBook);
			$udbBooksSubscribedTo=UdbBookDetail::where('deleted_at','=',null)->where('book_id','>=',$startBook)->where('book_id','<=',$endBook)->get();
			$userId=Auth::user()->id;
			$userEmail=Auth::user()->email;
			Log::info($udbBooksSubscribedTo);
			foreach ($udbBooksSubscribedTo as $key=>$udbBookSubscribedTo){
				$userBook=new UserBook();
				$userBook->user_id=$userId;
				$userBook->user_email=$userEmail;
				Log::info($udbBookSubscribedTo);
				$userBook->book_id=$udbBookSubscribedTo->book_id;
				$userBook->book_name=$udbBookSubscribedTo->book_name;
				$userBook->book_month=$udbBookSubscribedTo->book_month;
				$userBook->book_year=$udbBookSubscribedTo->book_year;
				$userBook->book_number=$udbBookSubscribedTo->book_number;
				$userBook->save();
			}
			return $paymentStatus;
		},2);
		//dispatch(new SubscriptionConfirmationMail($userEmail));
		$requestParams=$request->query->all();
		$paymentId=$requestParams['payment_id'];
		$paymentRequestId=$requestParams['payment_request_id'];
		event(new SubscriptionEvent(Auth::user(),PaymentRequest::where('payment_request_id','=',$paymentRequestId)->where('payment_id','=',$paymentId)->where('email','=',Auth::user()->email)->with('group')->firstOrFail()));
		return view('paymentstatus',array('status'=>$paymentStatus));
	}
}
