<?php

namespace App\Services\API\SubjectComment;

use App\Services\Interfaces\Filterer;

class SubjectCommentFilterer implements Filterer{

    public function filter($model, $filters = []){

        $professor_id   = $filters['professor_id'];
        $subject_id     = $filters['subject_id'];

        return $model->where('professor_id', $professor_id)->where('subject_id', $subject_id);
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