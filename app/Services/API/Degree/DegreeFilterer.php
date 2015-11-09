<?php

namespace App\Services\API\Degree;

use App\Services\Interfaces\Filterer;

class DegreeFilterer implements Filterer{

    public function filter($model, $filters){

        
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