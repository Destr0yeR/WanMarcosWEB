<?php

namespace App\Services\API\Event;

use App\Services\Interfaces\Formater;

class EventFormater implements Formater
{
    public function format($events){
        $_events = [];

        foreach ($events as $event) {
            $_events[] = $this->formatItem($event);
        }

        return $_events;
    }

    public function formatDetail($event){
        $_event = $this->formatItem($event);

        $_event['description']  = $event->description;

        if($event->website){
            $_event['website'] = $event->website;
        }
        else $_event['website'] = null; 

        if($event->information != ''){
            $_event['information']  = asset($event->information);
        }
        else $_event['information']  = null;

        if($event->place){
            $place = $event->place;

            $_event['place'] = [
                'id'    => $place->id,
                'name'  => $place->name,
            ];
        }
        else $_event['place'] = null;

        return $_event;
    }

    public function formatAutocomplete($events){
        $_events = [];

        foreach ($events as $event) {
            $_events[] = [
                'id'    => $event->id,
                'title' => $event->name
            ];
        }

        return $_events;
    }

    public function formatItem($event){

        $_event = [
            'id'        => $event->id,
            'title'     => $event->name,
            'starts_at' => $event->starts_at,
            'ends_at'   => $event->ends_at
        ];

        if($event->image){
            $_event['image'] = asset($event->image);
        }
        else if($event->category){
            if($event->category->default_image_url)$_event['image'] = asset($event->category->default_image_url);
            else $_event['image'] = asset(config('constants.default_event_image'));
        }
        else $_event['image'] = asset(config('constants.default_event_image'));

        return $_event;
    }
}
