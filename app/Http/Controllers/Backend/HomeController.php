<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\Notification\ForgotPasswordNotifier;

use App\Repositories\EndUserRepository;

use JWTAuth;

class HomeController extends Controller
{
    public function __construct(){
        $this->notifier = new ForgotPasswordNotifier;
        $this->user_repository = new EndUserRepository;
    }

    public function dashboard()
    {
        //
        return view('layouts.base');
    }

    public function getForgot(){
        return view('auth.forgot');
    }

    public function postForgot(Request $request){
        $email = $request->input('email');

        $user = $this->user_repository->getByEmail($email);

        if(!$user)return back()->withErrors(['El email no existe']);

        $token = JWTAuth::fromUser($user);
        $this->notifier->notify($user, $token);

        return back()->withErrors(['Revisa tu bandeja de entrada!']);
    }

    public function getRecover($token = null){
        return view('auth.recover', ['token' => $token]);
    }

    public function postRecover(Request $request, $token){

        $user = JWTAuth::toUser($token);

        $user->password = $request->input('password');
        $user->save();

        return back()->withErrors(['Password cambiado satisfactoriamente']);
    }
}
