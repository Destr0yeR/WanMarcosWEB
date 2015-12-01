<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewSubject extends Model {

    protected $table = 'reviewsubjects';

    public function subject(){
        return $this->belongsTo('App\Models\Subject');
    }

    public function user(){
        return $this->belongsTo('App\Models\EndUser','enduser_id', 'id');
    }
}