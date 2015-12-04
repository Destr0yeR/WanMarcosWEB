<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\API\Auth\AuthenticationRequest;

use JWTAuth;

use App\Repositories\SuggestionRepository;

class AuthController extends Controller
{
    public function __construct(){
        $this->suggestion_repository    = new SuggestionRepository;
    }

    public function authenticate(AuthenticationRequest $request){
        $credentials    = $request->only('email', 'password');    
        $data = $request->only('device_token', 'platform');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(
            [
                'error' => [
                        'message' => 'Credenciales inválidas. Por favor, intenta de nuevo.',
                        'reason' => [
				'Email y/o contraseña inválidos.',
			],
                        'suggestion' => 'Escribre crendenciales válidas.',
                        'code' => 2,
                        'description' => 'error_alert'
                    ]
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json(
                [
                    'error' => [
                        'message' => $e->getMessage(),
                        'reason' => ['Algo salió mal al intentar codificar el token.',],
                        'suggestion' => 'Intenta nuevamente.',
                        'code' => 3,
                        'description' => 'error_alert'
                    ]
                ], 500);
        }

        return response()->json(['token' => $token]);
    }

    public function refresh()
    {

        $token = JWTAuth::getToken();
        $newToken = JWTAuth::refresh($token);

        return response()->json(['token' => $newToken]);
    }
}
