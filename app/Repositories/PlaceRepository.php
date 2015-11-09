<?php

namespace App\Repositories;

use App\Models\Place;

class PlaceRepository {
    public function __construct() {
        
    }

    public function lists(){
        return Place::lists('name', 'id');
    }
}