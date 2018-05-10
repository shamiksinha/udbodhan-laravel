<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Model\UdbBookDetail;
use App\Model\UdbBookGroup;
use App\Model\UserSubscriptions;
use App\Model\UserAddresses;
use Illuminate\Support\Facades\Cache;

/**
 *
 * @author Shamik
 *        
 */
class SubscribeController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	
	public function showSubscribeForm(){
		$udbBookGrouped=Cache::get('udbBookGroups');
		if (!isset($udbBookGrouped)){
			$booksAvailable=UdbBookDetail::all('book_id','book_name','book_month','book_year','book_number')->where('deleted_at', null);
			$lastBook=$booksAvailable->last();
			$lastBookId=$lastBook['book_id'];		
			$bookYears=$booksAvailable->pluck('book_year','book_id');
			$bookMonths=$booksAvailable->pluck('book_month','book_id');		
			$udbBookGroups=UdbBookGroup::where('start_book_id','<=',$lastBookId)->where('end_book_id','<=',$lastBookId)->where('deleted_at','=',null)->select('group_id','books_in_group','start_book_id','end_book_id')->get();
			$udbBookGrouped=$udbBookGroups->mapToGroups(function($item,$key) use($bookYears,$bookMonths){
				$startBookId=$item['start_book_id'];
				$startBookYear=$bookYears->get($startBookId);
				$startBookMonth=$bookMonths->get($startBookId);
				$endBookId=$item['end_book_id'];
				$endBookYear=$bookYears->get($endBookId);
				$endBookMonth=$bookMonths->get($startBookId);
				return [$item['group_id']=>['start_book'=>['desc'=>$startBookYear.','.$startBookMonth,'year'=>$startBookYear,'month'=>$startBookMonth,'book_id'=>$startBookId],'end_book'=>['desc'=>$endBookYear.','.$endBookMonth,'year'=>$endBookYear,'month'=>$endBookMonth,'book_id'=>$endBookId],'num_of_books'=>$item['books_in_group']]];
			});
			$expiresAt = now()->addHours(20);		
			Cache::add('udbBookGroups', $udbBookGrouped, $expiresAt);
		}
		return view('subscribe')->with('udbBookGroup',$udbBookGrouped->flatten(1))->with('errors',collect());
	}
	
	public function getBookData(Request $request){
		$inputData=$request->input('selectedData');		
		$booksAvailable=UdbBookDetail::all('book_id','book_name','book_month','book_year','book_number')->where('deleted_at', null);
		$lastBook=$booksAvailable->last();
		$lastBookId=$lastBook['book_id'];
		Log::info($lastBook);
		Log::info($lastBookId);		
		$udbBookGroups=UdbBookGroup::where('start_book_id','<=',$lastBookId)->where('end_book_id','<=',$lastBookId)->where('books_in_group','=',$inputData)->where('deleted_at','=',null)->select('group_id','books_in_group','start_book_id','end_book_id')->with('startBook')->with('endBook')->get();
		return response()->json($udbBookGroups);
	}
	public function subscribe(Request $request){
		if ($request->getMethod () == Request::METHOD_POST){
			$userSubs=new UserSubscriptions;
			$input = $request->input();
			$userSubs->udb_user_member_code=$input['membercode'];
			$userSubs->udb_user_mobile_number=$input['mobile'];
			$userSubs->udb_user_mailing_address_id=UserAddresses::create([
					'udb_user_address_id'=>'BILLSHIP_'.Auth::id(),
					'udb_user_address_type'=>'BILLSHIP',
					'udb_user_state'=>$input['state'],
					'udb_user_country'=>$input['country'],
					'udb_user_address1'=>$input['mailingaddr1'],
					'udb_user_address2'=>$input['mailingaddr2']
			])->id();
			
			//$userSubs->udb_user_mailing_address_id=$input['membercode'];
			//$userSubs->udb_user_billing_address_id=$userSubs->udb_user_mailing_address_id;
			$userSubs->udb_is_billing_shipping_same='Y';
			$userSubs->udb_subcription_id='Subscription_1';
			$userSubs->save();
			return view('subscribe_complete');
		}		
	}
}