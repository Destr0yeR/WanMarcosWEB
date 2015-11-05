<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model {
    public function professors(){
        return $this->belongsToMany('App\Models\Professor');
    }
}