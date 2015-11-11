<?php

namespace App\Services\Backend\Auth;

use Auth;

class AuthService{

    public function getUser(){
        return Auth::user();
    }
}
