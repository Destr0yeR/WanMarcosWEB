<?php

namespace App\Services\Interfaces;

interface Formater{
    public function format($collection);
    public function formatDetail($object);
    public function formatItem($object);
}