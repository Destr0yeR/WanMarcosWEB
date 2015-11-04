<?php

namespace App\Services\API\Event;

use Services\Interfaces\Formater;

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
        $_event['website']      = asset($event->website);
        $_event['information']  = asset($event->information);

        if($event->place){
            $place = $event->place
            $_event['place'] = [
                'id'    => $place->id,
                'name'  => $place->name,
            ];
        }

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
    }

    private function formatItem($event){

        $_event = [
            'title'     => $event->name,
            'image_url' => asset($event->image),
            'starts_at' => $event->starts_at,
            'ends_at'   => $event->ends_at
        ];

        return $_event;
    }
}
