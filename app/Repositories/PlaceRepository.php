<?php

namespace App\Repositories;

use App\Models\Place;

class PlaceRepository {
    public function __construct() {
        
    }

    public function find($id){
        return Place::find($id);
    }

    public function lists(){
        return Place::lists('name', 'id');
    }

    public function paginated(){
        return Place::paginate(config('constants.per_page'));
    }

    public function store($data){
        $place = new Place;

        foreach ($data as $key => $value) {
            $place->$key = $value;
        }

        $place->save();

        if($place->image)$place->image = asset($place->image);

        return $place;
    }

    public function update($id, $data){
        $place = Place::find($id);

        foreach ($data as $key => $value) {
            $place->$key = $value;
        }

        $place->save();

        if($place->image)$place->image = asset($place->image);

        return $place;
    }

    public function delete($id){
        $place = Place::find($id);

        $place->delete();
    }
}