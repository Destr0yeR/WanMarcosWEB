<?php

namespace App\Services\API\Subject;

use App\Services\Interfaces\Formater;

use App\Repositories\ProfessorRepository;

class SubjectFormater implements Formater
{
    public function __construct(){
        $this->professor_repository = new ProfessorRepository;
    }

    public function format($subjects, $data = []){
        $_subjects = [];

        foreach ($subjects as $subject) {
            $_subjects[] = $this->formatItem($subject, $data);
        }

        return $_subjects;
    }

    public function formatDetail($subject, $data = []){
        $_subject   = $this->formatItem($subject, $data);

        if(array_key_exists('professor_id', $data))$professor_id = $data['professor_id'];
        else $professor_id = 0;

        if($professor_id){
            $professor  = $this->professor_repository->find($professor_id);

            $_subject['professor'] = [
                'name'  => $professor->first_name.' '.$professor->last_name
            ];
            
            $_subject['professor']['image'] = $professor->image?$professor->image:null;
        }
        else $_subject['professor'] = null;

        return $_subject;
    }

    public function formatAutocomplete($subjects){
        $_subjects = [];

        foreach ($subjects as $subject) {
            $_subjects[] = [
                'id'        => $subject->id,
                'name'      => $subject->name
            ];
        }

        return $_subjects;
    }

    public function formatItem($subject, $data = []){


        if(array_key_exists('professor_id', $data))$professor_id = $data['professor_id'];
        else $professor_id = 0;

        $score      = $subject->reviews()->where('professor_id', $professor_id)->avg('score');

        $_subject = [
            'id'            => $subject->id,
            'name'          => $subject->name,
            'score'         => $score
        ];

        $_subject['faculty'] = [
            'id'    => 1,
            'name'  => 'Facultad de Ingeniería de Sistemas e Informática'
        ];

        return $_subject;
    }
}
