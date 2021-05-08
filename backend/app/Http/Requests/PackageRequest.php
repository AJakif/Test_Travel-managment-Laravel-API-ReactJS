<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
           

            'package_name' => 'required | min:5 | max:20| unique:packages|bail',
            'package_location' => 'required | min:3 | max:30 ',
            'package_price' => 'required | numeric',
            'package_feature' => 'required |  min:3 | max:20  ',
            'package_image' => 'required | image|mimes:jpg,png',
            'package_time_duration' => 'required',
        
        ];
    }
}
