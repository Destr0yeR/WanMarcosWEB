<?php

namespace App\Services\API\Category;

use App\Services\Interfaces\Formater;

class CategoryFormater implements Formater
{
    public function format($categories){
        $_categories = [];

        foreach ($categories as $category) {
            $_categories[] = $this->formatItem($category);
        }

        return $_categories;
    }

    public function formatDetail($category){
        
    }

    public function formatAutocomplete($categories){
        $_categories = [];

        foreach ($categories as $category) {
            $_categories[] = [
                'id'    => $category->id,
                'name'  => $category->name
            ];
        }

        return $_categories;
    }

    public function formatItem($category){

    }
}
