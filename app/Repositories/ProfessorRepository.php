<?php

namespace App\Repositories;

use App\Services\API\Professor\ProfessorFormater;
use App\Services\API\Professor\ProfessorFilterer;

use App\Models\Professor;

class ProfessorRepository {
    public function __construct() {
        $this->formater = new ProfessorFormater;
        $this->filterer = new ProfessorFilterer;
    }

    public function getAllPaginated($filters, $page, $per_page){
        $model = Professor::distinct();

        $skip = ($page-1)*$per_page;
        $events = $this->filterer->filter($model, $filters)->skip($skip)->take($per_page)->get();

        return $this->formater->format($events);
    }
}