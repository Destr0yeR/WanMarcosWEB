<?php

namespace App\Services\API\Professor;

use App\Services\Interfaces\Filterer;

class ProfessorFilterer implements Filterer{

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
        $model->where('first_name', 'LIKE', $name);
        $model->orWhere('last_name', 'LIKE', $name);

        return $model;
    }
}