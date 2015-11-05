<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class EndUser extends Model implements AuthenticatableContract {

    use Authenticatable;
    
    protected $table = 'endusers';
    protected $hidden = ['password'];

    public function preferences(){
        return $this->hasMany('App\Models\Preference', 'enduser_id');
    }
}