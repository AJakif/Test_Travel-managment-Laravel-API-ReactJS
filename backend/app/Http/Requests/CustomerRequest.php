<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'username' => 'required | min:5 | max:20| unique:customers|bail',
            'fullname' => 'required | min:3 | max:30 ',
            'email' => 'required | min:10 | max:50 | email | unique:customers',
            'password' => 'required | regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/ | min:8 | max:20  ',
            'cpassword' => 'required | same:password',
            'phone' => 'required|digits:11',
            'address' => 'required',
            'gender' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'cpassword.required' => 'Password and Confirm Password did not match'
        

        ];
    }
}
