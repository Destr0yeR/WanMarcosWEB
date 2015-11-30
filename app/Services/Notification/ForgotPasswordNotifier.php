<?php
namespace App\Services\Notification;

use App\Services\Notification\Notifier;
use Mail;

class ForgotPasswordNotifier extends Notifier {
    protected $view = 'API.auth.forgot';
    public function notify($user, $token){
        Mail::send($this->view, ['token' => $token], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Recuperar contraseña!');
        });
    }
}