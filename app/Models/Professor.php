<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model {

    public function subjects(){
        return $this->belongsToMany('App\Models\Subject', 'professors_subjects');
    }

    public function reviews(){
        return $this->hasMany('App\Models\ReviewSubject');
    }
}