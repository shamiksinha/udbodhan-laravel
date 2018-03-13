<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UdbBookGroup extends Model
{
	use SoftDeletes;
    //
	protected $primaryKey='group_id';
	
	protected $keyType = 'string';
	
	public $incrementing = false;
	
	public function startBook(){
		return $this->hasOne('App\Model\UdbBookDetail','book_id','start_book_id');
	}
	
	public function endBook(){
		return $this->hasOne('App\Model\UdbBookDetail','book_id','end_book_id');
	}

	public function paymentRequests(){
		return $this->belongsToMany('App\Model\PaymentRequest','group_id','group_id');
	}
}
