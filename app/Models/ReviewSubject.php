<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewSubject extends Model {

    protected $table = 'reviewsubjects';

    public function subject(){
        return $this->belongsTo('App\Models\Subject');
    }
}