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

    public function find($id){
        return Professor::find($id);
    }

    public function paginated(){
        return Professor::paginate(config('constants.per_page'));
    }

    public function store($data){
        $professor = new Professor;

        foreach ($data as $key => $value) {
            $professor->$key = $value;
        }

        $professor->save();

        if($professor->image)$professor->image = asset($professor->image);
        
        return $professor;
    }

    public function update($id, $data){
        $professor = Professor::find($id);

        foreach ($data as $key => $value) {
            $professor->$key = $value;
        }

        $professor->save();

        if($professor->image)$professor->image = asset($professor->image);
        
        return $professor;
    }

    public function delete($id){
        $professor = Professor::find($id);

        $professor->delete();
    }
}