<?php

namespace App\Services\API\Degree;

use App\Services\Interfaces\Formater;

class DegreeFormater implements Formater
{
    public function format($degrees){
        $_degrees = [];

        foreach ($degrees as $degree) {
            $_degrees[] = $this->formatItem($degree);
        }

        return $_degrees;
    }

    public function formatDetail($degree){
        
    }

    public function formatAutocomplete($degree){
        $_degrees = [];

        foreach ($degrees as $degree) {
            $_degrees[] = [
                'id'    => $degree->id,
                'name'  => $degree->name
            ];
        }

        return $_degrees;
    }

    public function formatItem($degree){

    }
}
