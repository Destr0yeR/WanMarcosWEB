<?php

namespace App\Repositories;

use App\Services\API\Subject\SubjectFormater;
use App\Services\API\Subject\SubjectFilterer;

use App\Models\Subject;

class SubjectRepository {
    public function __construct() {
        $this->formater = new SubjectFormater;
        $this->filterer = new SubjectFilterer;
    }

    public function getById($id, $data = []){

        $subject = Subject::find($id);

        return $this->formater->formatDetail($subject, $data);
    }

    public function getAllPaginated($filters, $page, $per_page){
        $model = Subject::distinct();

        $skip = ($page-1)*$per_page;
        $subjects = $this->filterer->filter($model, $filters)->skip($skip)->take($per_page)->get();

        return $this->formater->format($subjects, $filters);
    }
}