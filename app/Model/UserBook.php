<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    public function user(){
		return this->belongsTo('App\User');
	}

	public function book(){
		return $this->hasOne('App\Model\UdbBookDetail','book_id','book_id');
	}
}
