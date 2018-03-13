<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UdbRoleUser extends Model
{
    //
    protected $table = 'udb_role_user';

    public function addreses(){
		return $this->hasMany('App\UserAddresses');
	}
}
