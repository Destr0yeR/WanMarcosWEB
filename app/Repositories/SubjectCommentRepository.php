<?php

namespace App\Repositories;

use App\Models\ReviewSubject;

use App\Services\API\SubjectComment\SubjectCommentFormater;
use App\Services\API\SubjectComment\SubjectCommentFilterer;

class SubjectCommentRepository {
    public function __construct() {
        $this->formater = new SubjectCommentFormater;
        $this->filterer = new SubjectCommentFilterer;
    }

    public function getAllPaginated($filters, $page, $per_page){
        $model = ReviewSubject::distinct();

        $skip = ($page-1)*$per_page;
        
        $events = $this->filterer->filter($model, $filters)->skip($skip)->take($per_page)->get();

        return $this->formater->format($events);
    }
}