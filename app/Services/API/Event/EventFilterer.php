<?php

class EventFilterer implements Filterer{

    public function filter(){

        return $model;
    }

    public function filterAutocomplete($model, $search_text){

        return $model;
    }
}