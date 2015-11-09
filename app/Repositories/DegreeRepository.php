<?php

namespace App\Repositories;

use App\Services\API\Degree\DegreeFormater;
use App\Services\API\Degree\DegreeFilterer;

use App\Models\Degree;

class DegreeRepository {
    public function __construct() {
        $this->filterer = new DegreeFilterer;
        $this->formater = new DegreeFormater;
    }

    public function getAutocomplete($search_text, $max_items){
        $model = Degree::distinct();

        $events = $this->filterer->filterAutocomplete($model, $search_text)->take($max_items)->get();
        
        return $this->formater->formatAutocomplete($events);
    }
}