<?php

namespace App\Services\API\Place;

use App\Services\Interfaces\Filterer;

class PlaceFilterer implements Filterer{

    public function filter($model, $filters){

        $preferences = $filters['preferences'];

        $search_text = '%'.$filters['search_text'].'%';

        return $this->filterByName($model, $search_text);
    }

    public function filterAutocomplete($model, $search_text){
        $search_text = '%'.$search_text.'%';
        return $this->filterByName($model, $search_text);
    }

    private function filterByName($model, $name){
        $model->where('name', 'LIKE', $name);

        return $model;
    }
}