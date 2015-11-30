<?php

namespace App\Repositories;

use App\Models\Category;

use App\Services\API\Category\CategoryFormater;
use App\Services\API\Category\CategoryFilterer;

class CategoryRepository {
    public function __construct() {
        $this->formater = new CategoryFormater;
        $this->filterer = new CategoryFilterer;
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

    public function delete($id){
        $category = Category::find($id);

        $category->delete();
    }

    public function getAutocomplete($search_text, $max_items){
        $model = Category::distinct();

        $events = $this->filterer->filterAutocomplete($model, $search_text)->take($max_items)->get();
        
        return $this->formater->formatAutocomplete($events);
    }
}