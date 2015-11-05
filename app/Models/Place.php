<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model {
    protected $table = 'places';

    public function events(){
        return $this->hasMany('App\Models\Event');
    }
}