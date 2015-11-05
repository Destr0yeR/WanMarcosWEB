<?php

namespace App\Services\API\Auth;

use JWTAuth;

class AuthService {
    public function getUser(){
        return JWTAuth::parseToken()->authenticate();
    }
}