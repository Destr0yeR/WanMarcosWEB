<?php

namespace App\Services\API\Place;

use App\Services\Interfaces\Formater;

class PlaceFormater implements Formater
{
    public function format($places){
        $_places = [];

        foreach ($places as $place) {
            $_places[] = $this->formatItem($place);
        }

        return $_places;
    }

    public function formatDetail($place){
        $_place = $this->formatItem($place);

        return $_place;
    }

    public function formatAutocomplete($places){
        $_places = [];

        foreach ($places as $place) {
            $_places[] = [
                'id'        => $place->id,
                'name'      => $place->name 
            ];
        }

        return $_places;
    }

    public function formatItem($places){

        $_place = [
            'id'            => $place->id,
            'name'          => $place->name,
            'latitude'      => $place->latitude,
            'longitude'     => $place->longitude     
        ];

        if($places->image)$_place['image'] = asset($places->image);
        else $_place['image'] = null;

        return $_place;
    }
}
