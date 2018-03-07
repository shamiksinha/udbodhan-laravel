<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentRequest extends Model
{
    //
	use SoftDeletes;

	public function group(){
	       return $this->hasOne('App\Model\UdbBookGroup','group_id','group_id');
    }

    public function user(){
	       return $this->hasOne('App\User','email','email');
    }
}
