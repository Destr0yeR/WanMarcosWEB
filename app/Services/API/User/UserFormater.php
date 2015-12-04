<?php

namespace App\Services\API\User;

use App\Services\Interfaces\Formater;

use App\Repositories\FacultyRepository;
use App\Repositories\DegreeRepository;

class UserFormater implements Formater {

    public function __construct(){
        $this->faculty_repository = new FacultyRepository;
        $this->degree_repository = new DegreeRepository;
    }

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

        if($user->faculty_id){
            $faculty = $this->faculty_repository->find($user->faculty_id);
            $_user['faculty'] = [
                'id'    => $faculty->id,
                'name'  => $faculty->name
            ];
        }
        else $_user['faculty'] = null;

        if($user->degree_id){
            $degree = $this->degree_repository->find($user->degree_id);
            $_user['degree'] = [
                'id'    => $degree->id,
                'name'  => $degree->name
            ];
        }
        else $_user['degree'] = null;

        return $_user;
    }
}