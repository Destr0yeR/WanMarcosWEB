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

    public function paginated(){
        return Degree::paginate(config('constants.per_page'));
    }

    public function store($data){
        $degree = new Degree;

        foreach ($data as $key => $value) {
            $degree->$key = $value;
        }

        $degree->save();

        return $degree;
    }

    public function find($id){
        return Degree::find($id);
    }

    public function update($id, $data){
        $degree = Degree::find($id);

        foreach ($data as $key => $value) {
            $degree->$key = $value;
        }

        $degree->save();

        return $degree;
    }

    public function delete($id){
        $degree = Degree::find($id);

        $degree->delete();
    }
}