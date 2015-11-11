<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository {
    public function __construct() {
        
    }

    public function lists(){
        return Category::lists('name', 'id');
    }

    public function find($id){
        return Category::find($id);
    }

    public function paginated(){
        $categories = Category::paginate(config('constants.per_page'));

        return $categories;
    }

    public function store($data){
        $category = new Category;

        foreach ($data as $key => $value) {
            $category->$key = $value;
        }

        $category->save();

        if($category->image)$category->image = asset($category->image);

        return $category;
    }

    public function update($id, $data){
        $category = Category::find($id);

        foreach ($data as $key => $value) {
            $category->$key = $value;
        }

        $category->save();

        if($category->image)$category->image = asset($category->image);

        return $category;
    }
}