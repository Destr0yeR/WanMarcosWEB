<?php

namespace App\Services\API\User;

use App\Services\Interfaces\Formater;

class UserFormater implements Formater {

    public function format($users){
        
    }

    public function formatDetail($user){
        $_user = $this->formatItem($user);

        return $_user;
    }

    public function formatItem($user){
        $_user = [
            'first_name'    => $user->first_name,
            'last_name'     => $user->last_name,
            'email'         => $user->email,
        ];

        if($user->image){
            $_user['image'] = asset($user->image);
        }
        else $_user['image'] = null;

        return $_user;
    }
}