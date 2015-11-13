<?php

namespace App\Repositories;

use App\Models\Suggestion;

class SuggestionRepository {
    public function __construct() {
        
    }

    public function paginated(){
        return Suggestion::paginate(config('constants.per_page'));
    }

    public function store($data){
        $suggestion = new Suggestion;

        foreach ($data as $key => $value) {
            $suggestion->$key = $value;
        }

        $suggestion->save();

        return $suggestion;
    }

    public function delete($id){
        $suggestion = Suggestion::find($id);

        $suggestion->delete();
    }
}