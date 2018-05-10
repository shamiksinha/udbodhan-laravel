<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    public function user(){
		return $this->belongsTo('App\User');
	}

	public function group(){
		return $this->hasOne('App\Model\UdbBookGroup','group_id','group_id');
	}
}
