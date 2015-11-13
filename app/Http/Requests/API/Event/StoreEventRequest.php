<?php

namespace App\Http\Requests\API\Event;

use App\Http\Requests\Request;

class StoreEventRequest extends Request
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
            'name'          => 'required',
            'description'   => 'required',
            'starts_at'     => 'required|integer',
            'ends_at'       => 'required|integer'
        ];
    }

    public function response(array $errors)
    {
        return response()->json([
            'error' => [
                'message' => 'Datos inválidos.',
                'reason' => $errors,
                'suggestion' => 'Intenta nuevamente con datos válidos.',
                'code' => 5,
                'description' => 'error_alert'
                ]
        ], 400);
    }
}
