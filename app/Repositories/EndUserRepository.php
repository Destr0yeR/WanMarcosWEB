<?php

namespace App\Repositories;

use App\Services\API\Auth\AuthService;
use App\Services\API\User\PreferenceFormater;
use App\Services\API\User\UserFormater;

use App\Models\EndUser;

class EndUserRepository{

    public function __construct(){
        $this->auth_service         = new AuthService;
        $this->preference_formater  = new PreferenceFormater;
        $this->formater             = new UserFormater;
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

    public function update($data){
        $user = $this->auth_service->getUser();

        foreach ($data as $key => $value) {
            $user->$key = $value;
        }

        $user->save();

        return $user;
    }

    public function getPreferences(){
        $user = $this->auth_service->getUser();

        $preferences = $user->preferences;

        return $this->preference_formater->format($preferences);
    }

    public function getAuthenticatedUser(){
        $user = $this->auth_service->getUser();

        $user = $this->formater->formatDetail($user);
        $user['preferences'] = $this->getPreferences();

        return $user;
    }

    public function getByEmail($email){
        return EndUser::where('email', $email)->first();
    }

    public function changeImage($image){

    }
}