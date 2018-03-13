<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserAddresses extends Model
{
    //
	protected $table = 'udb_user_address';
	
	public function userSubscription(){
		return $this->belongsTo('App\UserSubscriptions');
	}
}
