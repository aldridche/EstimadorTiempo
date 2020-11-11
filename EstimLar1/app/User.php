<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User  as Authenticatable;
// class User extends Authenticatable
// {
class  User  extends  Authenticatable  implements  JWTSubject {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $fillable = [
        'name', 'surname', 'email', 'password',
    ];

    protected  $hidden = [
        'password', 'remember_token',
    ];

    protected  $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function  getJWTIdentifier() {
        return  $this->getKey();
    }

    public  function  getJWTCustomClaims() {
        return [];
    }
}
