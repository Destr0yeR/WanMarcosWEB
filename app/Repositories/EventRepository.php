<?php

namespace Repositories;

use App\Services\Event\EventFormater;
use App\Services\Event\EventFilterer;

use App\Models\Event;

class EventRepository {
    public function __construct() {
        $this->formater = new EventFormater;
        $this->filterer = new EventFilterer;
    }

    public function getById($id){
        $event = Event::find($id);

        return $this->formater->formatDetail($event);
    }

    public function getAllPaginated($filters, $page, $per_page){
        $model = Event::distinct();

        $skip = ($page-1)*$per_page;
        $events = $this->filterer->filter($model, $filters)->skip($skip)->take($per_page)->get();

        return $this->formater->format($events);
    }

    public function getAutocomplete($search_text, $max_items){
        $model = Event::distinct();

        $events = $this->filterer->filterAutocomplete($model, $search_text)->take($max_items)->get();

        return $this->formater->formatAutocomplete($vents);
    }
}