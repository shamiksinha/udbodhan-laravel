<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Model\UdbBookGroup;
use App\Model\UdbCommonConstant;
use App\Model\PaymentRequest;
use App\Model\UdbBookDetail;
use App\Model\UserBook;
use App\Model\UserGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Events\SubscriptionEvent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class BuyBookController extends Controller {
	protected $client;
	
	public function __construct(Client $client) {
		$this->client = $client;
		$this->middleware('auth');
	}
	
	public function buybooks(Request $request){
		$numOfBooks=$request->input('numofbooks');
		$booksToBuy=$request->input('bookstobuy');
		Log::info("Num of Books=".$request->input('numofbooks'));
		Log::info("Group Id=".$request->input('bookstobuy'));
		if (null==$request->input('numofbooks') || null==$request->input('bookstobuy')){
			$errors=collect();
			if (null==$request->input('numofbooks')){
				$errors=$errors->put('numofbooks' ,'Select the years of books to buy');
			}			
			if (null==$request->input('bookstobuy')){
				$errors=$errors->put('bookstobuy' , 'Select books to buy');
			}
			Log::info("Errors =".$errors);
			return view('subscribe')->with('udbBookGroup',Cache::get('udbBookGroups')->flatten(1))->with('errors',$errors);
		}
		$email=Auth::user()->email;
		$userId=Auth::user()->id;
		$userGroup=UserGroup::where('group_id','=',$request->input('bookstobuy'))->where('user_id','=',$userId)->where('user_email','=',$email)->first();
		if (!isset($userGroup)){
			Log::info("Group Id=".$request->input('bookstobuy'));
			$price=UdbBookGroup::where('group_id','=',$request->input('bookstobuy'))->get()->pluck('final_price')->first();
			Log::info("Payable=".$price);
			$gstRate=floatval(BuyBookController::getCommonConstantData('UDB_SUBSCRIPTION','GST_RATE'));
			Log::info("GST=".$gstRate);
			$intamojoRate=floatval(BuyBookController::getCommonConstantData('UDB_SUBSCRIPTION','PAYMENTGATEWAY_RATE'));
			Log::info("Transaction Charges Rate=".$intamojoRate);
			$intamojoConstant=floatval(BuyBookController::getCommonConstantData('UDB_SUBSCRIPTION','PAYMENTGATEWAY_CONSTANT'));
			$gstRate=1+$gstRate;
			$rateAfterPaymentGateway=$gstRate*$intamojoRate;
			$finalTax=$gstRate+$rateAfterPaymentGateway;
			$tax = $finalTax*$price+$intamojoConstant-$price;
			$actualPrice=$price+$tax;
			Log::info("Actual Price=".$actualPrice);
			return view('buybooks')->with(array('price'=>$price,'tax'=>$tax,'total'=>$actualPrice,'groupid'=>$request->input('bookstobuy'),'bookid'=>null));
		} else {
			$headers = array(
                'Content-Type' => 'application/octet-stream',
            );
			$zipFileToDownload=BuyBookController::groupFileDownloads($userGroup);
			return Storage::disk('public')->download($zipFileToDownload,basename($zipFileToDownload),$headers);
		}
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
			$paymentRequest->book_id=$request->input('bookid');
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
			if (isset($groupId)){
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
				UserGroup::create([
					'user_id'=>$userId,
					'user_email'=>$userEmail,
					'group_id'=>$groupId,
					'books_in_group'=>$udbBookGroup->books_in_group,
					'start_book_id'=>$startBook,
					'end_book_id'=>$endBook,
				]);
			}
			$bookId=$paymentRequest->book_id;			
			if (isset($bookId)){
				$book=UdbBookDetail::find($bookId);
				$userId=Auth::user()->id;
				$userEmail=Auth::user()->email;
				UserBook::create([
					'user_id' => $userId,
					'user_email' => $userEmail,
					'book_id' => $bookId,
					'book_name' => $book['book_name'],
					'book_month' => $book['book_month'],
					'book_year' => $book['book_year'],
					'book_number' => $book['book_number'],
				]);
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
	
	public function groupFileDownloads(UserGroup $userGroup) {
		$currDir=getcwd();
		//Log::info(getcwd() . "\n");
		//Log::info(asset('storage/pdf/UDB-001-1305-06-01-01-MAGH.pdf') . "\n");
		$pdfFilePath='pdf/';		
		$zipFile=new ZipArchive;
		$udbBookGroup=UdbBookGroup::where('group_id','=',$userGroup->group_id)->first();
		$startBookName=$udbBookGroup->startBook->book_name;
		$startBookNameParts=explode('-',$startBookName);
		$zipFileName=implode('-',['UDB',$startBookNameParts[1],$startBookNameParts[2]]).'.zip';
		Log::info('Zip File Name '.$zipFileName);
		$zipFilePath='pdf/zip/'.$zipFileName;
		Log::info('Zip File path '.$zipFilePath);
		if ($zipFile->open('storage/'.$zipFilePath, ZipArchive::CREATE|ZipArchive::OVERWRITE) === TRUE) {
			Log::info('Creating zip file under '.$zipFilePath);
			$startBook=$udbBookGroup->startBook->book_id;
			$endBook=$udbBookGroup->endBook->book_id;			
			$udbBooksSubscribedTo=UdbBookDetail::where('deleted_at','=',null)->where('book_id','>=',$startBook)->where('book_id','<=',$endBook)->get();
			foreach ($udbBooksSubscribedTo as $key=>$udbBookSubscribedTo){
				$fileToAdd=$pdfFilePath.$udbBookSubscribedTo->book_name;
				if(Storage::disk('public')->exists($fileToAdd)){
					//Log::info('Url to pdf file '.Storage::disk('public')->url($fileToAdd));
					if($zipFile->addFile('storage/'.$fileToAdd,$udbBookSubscribedTo->book_name)){
						Log::info($fileToAdd.' has been added to zip');
					} else {
						Log::info($fileToAdd.' has not been added to zip');
					}
				}else{
					Log::error($fileToAdd.' does not exist');
				}
			}
			if($zipFile->close()){
				Log::info('Zip file '.$zipFilePath.' has been created and placed');
			}else{
				Log::info('Zip file '.$zipFilePath.' has not been created and placed');
			}
		}
		return $zipFilePath;	
	}
	
	public static function getCommonConstantData($moduleName,$attributeKey){
		return UdbCommonConstant::where('deleted_at','=',null)->where('attribute_module','=',$moduleName)->where('attribute_key','=',$attributeKey)->select('attribute_value')->first()['attribute_value'];
	}
}
