<?php

namespace App\Services\API\User;

use App\Services\Interfaces\Formater;

class PreferenceFormater implements Formater {

    public function format($preferences){
        $_preferences = [];

        foreach ($preferences as $preference) {
            $_preferences[$preference->tag] = $preference->value;
        }

        return $_preferences;
    }

    public function formatDetail($preference){

    }

    public function formatItem($preference){

    }
}