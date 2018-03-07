<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UdbBookDetail extends Model
{
	use SoftDeletes;
	
	protected $primaryKey='book_id';
	
	protected $keyType = 'string';
	
	public $incrementing = false;
	
	public function groups(){
		return $this->belongsToMany('App\Model\UdbBookGroup');
	}

}
