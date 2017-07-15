<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserSubscriptions;
use App\UserAddresses;

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
		return view('subscribe');
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