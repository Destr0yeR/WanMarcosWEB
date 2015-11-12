<?php

namespace App\Repositories;

use App\Services\API\Faculty\FacultyFormater;
use App\Services\API\Faculty\FacultyFilterer;

use App\Models\Faculty;

class FacultyRepository {
    public function __construct() {
        $this->filterer = new FacultyFilterer;
        $this->formater = new FacultyFormater;
    }

    public function lists(){
        return Faculty::lists('name', 'id');
    }

    public function getAutocomplete($search_text, $max_items){
        $model = Faculty::distinct();

        $events = $this->filterer->filterAutocomplete($model, $search_text)->take($max_items)->get();
        
        return $this->formater->formatAutocomplete($events);
    }

    public function paginated(){
        return Faculty::paginate(config('constants.per_page'));
    }

    public function store($data){
        $faculty = new Faculty;

        foreach ($data as $key => $value) {
            $faculty->$key = $value;
        }

        $faculty->save();

        return $faculty;
    }

    public function update($id, $data){
        $faculty = Faculty::find($id);

        foreach ($data as $key => $value) {
            $faculty->$key = $value;
        }

        $faculty->save();

        return $faculty;
    }

    public function find($id){
        return Faculty::find($id);
    }
}