<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourguideRequest extends FormRequest
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
            'username' => 'required | min:5 | max:20| unique:tourguides|bail',
            'fullname' => 'required | min:3 | max:30 ',
            'email' => 'required | min:5 | max:30 | email | unique:tourguides',
            'password' => 'required | regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/ | min:8 | max:20  ',
            'cpassword' => 'required | same:password',
            'phone' => 'required|digits:11',
           
        ];
    }
}
