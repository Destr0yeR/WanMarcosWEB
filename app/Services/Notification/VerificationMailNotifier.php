<?php
namespace App\Services\Notification;

use App\Services\Notification\Notifier;
use Mail;

class VerificationMailNotifier extends Notifier {
    protected $view = 'API.emails.verification-register';
    public function notify($user, $token){
        Mail::send($this->view, ['token' => $token], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }
}