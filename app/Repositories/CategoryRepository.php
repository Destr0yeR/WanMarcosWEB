<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository {
    public function __construct() {
        
    }

    public function lists(){
        return Category::lists('name', 'id');
    }
}