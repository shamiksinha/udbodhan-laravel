<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
	protected $fillable = [
    		'user_id', 'user_email', 'book_id', 'book_name','book_month', 'book_year', 'book_number',
    ];
	
    public function user(){
		return $this->belongsTo('App\User');
	}

	public function book(){
		return $this->hasOne('App\Model\UdbBookDetail','book_id','book_id');
	}
}
