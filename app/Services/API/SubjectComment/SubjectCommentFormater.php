<?php

namespace App\Services\API\SubjectComment;

use App\Services\Interfaces\Formater;

class SubjectCommentFormater implements Formater
{
    public function format($comments, $data = []){
        $_comments = [];

        foreach ($comments as $comment) {
            $_comments[] = $this->formatItem($comment, $data);
        }

        return $_comments;
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

    public function formatItem($comment, $data = []){
        
        $_comment = [
            'id'       => $comment->id,
            'user'     => [
                'id'            => $comment->user->id,
                'first_name'    => $comment->user->first_name,
                'last_name'     => $comment->user->last_name
            ],
            'score'    => $comment->score,
            'message'  => $comment->message
        ];

        return $_comment;
    }
}
