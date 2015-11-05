<?php

namespace App\Services\Interfaces;

interface Filterer{

    public function filter($model, $filters);
    public function filterAutocomplete($model, $search_text);
}