<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserSubscriptions extends Model
{
    //
	protected $table = 'udb_user_subscriptions';
	protected $fillable = [
			'udb_user_member_code', 'udb_user_mobile_number', 'udb_user_mailing_address_id', 'udb_user_billing_address_id','udb_is_billing_shipping_same','udb_subcription_id',
	];
	
	public function addresses(){
		return $this->hasMany('App\UserAddresses');
	}
}
