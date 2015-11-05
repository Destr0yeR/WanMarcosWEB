<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {
    protected $table = 'events';

    public function place(){
        return $this->belongsTo('App\Models\Place');
    }
}