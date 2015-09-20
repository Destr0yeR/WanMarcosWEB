<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EndUser extends Model {
    protected $table = 'endusers';
    protected $hidden = ['password'];
}