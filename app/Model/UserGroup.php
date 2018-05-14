<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
	protected $fillable = [
    		'user_id', 'user_email', 'group_id', 'books_in_group','start_book_id', 'end_book_id',
    ];
	
    public function user(){
		return $this->belongsTo('App\User');
	}

	public function group(){
		return $this->hasOne('App\Model\UdbBookGroup','group_id','group_id');
	}
}
