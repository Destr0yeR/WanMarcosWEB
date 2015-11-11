<?php
namespace App\Services\Notification;

use App\Services\Notification\Notifier;
use Mail;

class ContactUserAboutEventNotifier extends Notifier {
    protected $view = 'BACKEND.emails.contact';

    public function notify($user, $message){
        $data = [
            'name'      => $user->first_name.' '.$user->last_name,
            'body'      => $message
        ];

        Mail::send($this->view, $data, function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('La Administración de WanMarcos desea contactar contigo.');
        });
    }
}