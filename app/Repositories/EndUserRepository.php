<?php

namespace App\Repositories;

use App\Services\API\Auth\AuthService;
use App\Services\API\User\PreferenceFormater;

use App\Models\EndUser;

class EndUserRepository{

    public function __construct(){
        $this->auth_service = new AuthService;
        $this->preference_formater = new PreferenceFormater;
    }

    public function storeEndUser(array $data, $device_id, $operating_system)
    {
        $user = new EndUser();
        $user->first_name       = $data['first_name'];
        $user->last_name        = $data['last_name'];
        $user->password         = bcrypt($data['password']);
        $user->email            = $data['email'];
        $user->initial_setup    = 0;
        $user->save();

        return $user;
    }

    public function getPreferences(){
        $user = $this->auth_service->getUser();

        $preferences = $user->preferences;

        return $this->preference_formater->format($preferences);
    }
}