<?php

namespace App\Services\Notification;

abstract class Notifier {
    abstract public function notify($to, $message);
}