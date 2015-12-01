<?php

namespace App\Services\API\SubjectComment;

use App\Services\Interfaces\Formater;

class SubjectCommentFormater implements Formater
{
    public function format($subjects, $data = []){
        $_subjects = [];

        foreach ($subjects as $subject) {
            $_subjects[] = $this->formatItem($subject, $data);
        }

        return $_subjects;
    }

    public function formatDetail($subject, $data = []){
        $_subject   = $this->formatItem($subject, $data);

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
            'score'         => $score,
            'professor_id'  => $professor_id
        ];

        return $_subject;
    }
}
