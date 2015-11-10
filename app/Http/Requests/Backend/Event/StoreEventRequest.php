<?php

namespace App\Http\Requests\Backend\Event;

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
            //
            'name'          => 'required',
            'description'   => 'required',
            'starts_at_date'=> 'required',
            'starts_at_time'=> 'required',
            'ends_at_date'  => 'required',
            'ends_at_time'  => 'required'
        ];
    }

    public function response(array $errors){
        return redirect()->back()->withInput()->withErrors($errors);
    }
}
