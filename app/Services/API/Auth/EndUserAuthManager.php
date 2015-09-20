<?php

namespace App\Services\API\Auth;

use Illuminate\Auth\AuthManager;
use Illuminate\Auth\EloquentUserProvider;

class EndUserAuthManager extends AuthManager
{
    protected function createEloquentProvider()
    {
        return new EloquentUserProvider($this->app['hash'], 'App\Models\EndUser');
    }

}
