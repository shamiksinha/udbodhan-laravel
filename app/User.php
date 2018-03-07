<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /* protected $fillable = [
        'name', 'email', 'password',
    ]; */
    protected $fillable = [
    		'firstname', 'lastname', 'email', 'password','avatar', 'provider_id', 'provider','access_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function books(){
        return $this->belongsToMany('App\Model\UserBook');
    }

    public function paymentRequests(){
        return $this->belongsToMany('App\Model\PaymentRequest','email','email');
    }
}
