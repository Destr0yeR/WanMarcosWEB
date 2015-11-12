<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model {

    public function faculty(){
        return $this->belongsTo('App\Models\Faculty');
    }
}