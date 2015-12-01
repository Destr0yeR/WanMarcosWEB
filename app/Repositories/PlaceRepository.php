<?php

namespace App\Repositories;

use App\Models\Place;

use App\Services\API\Place\PlaceFormater;
use App\Services\API\Place\PlaceFilterer;

class PlaceRepository {
    public function __construct() {
        $this->formater = new PlaceFormater;
        $this->filterer = new PlaceFilterer;
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

    public function getAutocomplete($search_text, $max_items){
        $model = Place::distinct();

        $events = $this->filterer->filterAutocomplete($model, $search_text)->take($max_items)->get();
        
        return $this->formater->formatAutocomplete($events);
    }

    public function getAllPaginated($filters, $page, $per_page){
        $model = Place::distinct();

        $skip = ($page-1)*$per_page;
        $events = $this->filterer->filter($model, $filters)->skip($skip)->take($per_page)->get();

        return $this->formater->format($events);
    }
}