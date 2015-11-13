<?php

namespace App\Http\Requests\API\Auth;

use App\Http\Requests\Request;

class AuthenticationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'email'         => 'required|email',
            'password'      => 'required',
            'device_token'  => 'required',
            'platform'      => 'required'
        ];
    }

    public function response(array $errors){
        return response()->json([
            'error' => [
                'message'       => 'Datos inválidos',
                'reason'        => $errors,
                'suggestion'    => 'Escribe credenciales válidas',
                'code'          => 1,
                'description'   => 'error_alert'
            ]
        ], 400);
    }
}
