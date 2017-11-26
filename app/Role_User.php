<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    //
    protected $table = 'udb_role_user';

    public function addreses(){
		return $this->hasMany('App\UserAddresses');
	}
}
