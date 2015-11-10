<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Backend\Auth\LoginRequest;

use Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request){
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ];

        if (Auth::attempt($data)) {
            return redirect()->intended('dashboard');
        }

        return redirect()->back()->withErrors(['El Email y/o Password no son válidos.']);
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('dashboard');
    }
}
