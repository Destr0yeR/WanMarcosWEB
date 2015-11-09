<?php

namespace App\Services\API\Faculty;

use App\Services\Interfaces\Formater;

class FacultyFormater implements Formater
{
    public function format($faculties){
        $_faculties = [];

        foreach ($faculties as $faculty) {
            $_faculties[] = $this->formatItem($faculty);
        }

        return $_faculties;
    }

    public function formatDetail($faculty){
        
    }

    public function formatAutocomplete($faculties){
        $_faculties = [];

        foreach ($faculties as $faculty) {
            $_faculties[] = [
                'id'    => $faculty->id,
                'name'  => $faculty->name
            ];
        }

        return $_faculties;
    }

    public function formatItem($faculty){

    }
}
