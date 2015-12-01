<?php

namespace App\Services\API\Subject;

use App\Services\Interfaces\Filterer;

class SubjectFilterer implements Filterer{

    public function filter($model, $filters = []){

        $professor_id = $filters['professor_id'];

        return $this->filterByName($model, $professor_id);
    }

    public function filterAutocomplete($model, $search_text){
        $search_text = '%'.$search_text.'%';
        return $this->filterByName($model, $search_text);
    }

    private function filterByName($model, $professor_id){
        $model->whereHas('professors', function($q)use($professor_id){
            $q -> where('professor_id', $professor_id);
        });

        return $model;
    }
}