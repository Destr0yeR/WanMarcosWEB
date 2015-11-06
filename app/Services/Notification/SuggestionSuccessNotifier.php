<?php
namespace App\Services\Notification;

use App\Services\Notification\Notifier;
use Mail;

class SuggestionSuccessNotifier extends Notifier {
    protected $view = 'API.emails.suggestion-success';

    public function notify($user, $data = null){
        $data = [
            'name' => $user->first_name.' '.$user->last_name
        ];

        Mail::send($this->view, $data, function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Sugerencia enviada satisfactoriamente!');
        });
    }
}