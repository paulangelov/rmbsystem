<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'accountid' => 'required|numeric',
            'password' => 'required',
        ];
    }

    public function messages(){

        return[
            'accountid.required' => 'Please input your Account ID',
            'password.required' => 'Please input your Password',
            'accountid.numeric' => 'Account ID must be in numeric format: ex. 123***78',
        ];
    }
}
