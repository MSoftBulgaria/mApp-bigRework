<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token','password','created_at','updated_at'];
    
    public function returnPass(){
    	return  $this->password;
    }
    
    public function comment() {
    	return $this->hasMany('App/Comment');
    }
    
    public function video() {
    	return $this->hasMany('App/Video');
    }
    
}
