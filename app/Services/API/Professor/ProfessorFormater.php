<?php

namespace App\Services\API\Professor;

use App\Services\Interfaces\Formater;

class ProfessorFormater implements Formater
{
    public function format($professors){
        $_professors = [];

        foreach ($professors as $professor) {
            $_professors[] = $this->formatItem($professor);
        }

        return $_professors;
    }

    public function formatDetail($professor){
        $_professor = $this->formatItem($professor);

        return $_professor;
    }

    public function formatAutocomplete($professors){
        $_professors = [];

        foreach ($professors as $professor) {
            $_professors[] = [
                'id'        => $professor->id,
                'name'      => $professor->first_name.' '.$professor->last_name
            ];
        }

        return $_professors;
    }

    public function formatItem($professor){

        $_professor = [
            'id'            => $professor->id,
            'first_name'    => $professor->first_name,
            'last_name'     => $professor->last_name,        
        ];

        if($professor->image)$_professor['image'] = asset($professor->image);
        else $_professor['image'] = null;

        return $_professor;
    }
}
