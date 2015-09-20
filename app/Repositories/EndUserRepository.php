<?php

namespace App\Repositories;

use App\Models\EndUser;

class EndUserRepository{
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
}