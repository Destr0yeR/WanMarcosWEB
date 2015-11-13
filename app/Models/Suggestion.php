<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model {

    public function user(){
        return $this->belongsTo('App\Models\EndUser','enduser_id', 'id');
    }
}