<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $timestamp = strtotime('-15 years');

        return [
            'firstname'				=>	'required|min:2|alpha',
            'lastname'				=>	'required|min:2|alpha',
            'email'					=> 	'required|email|unique:users',
            'username'              =>  'required|alpha|numeric|unique:users',
            'password'				=>	'required|confirmed|between:4,12',
            'password_confirmation'	=> 	'required',
            'gender'				=>	'required|alpha|size:1',
            'month'					=>	'required|numeric|between:01,12',
            'day'					=>	'required|numeric|between:01,31',
            'year'					=>	'required|numeric|before:'.date('Y', $timestamp),
        ];
    }

    public function messages()
    {
        return [
            'firstname'=>'First name must be alphabets please',
            'lastname'=>'last name must be alphabets only',
        ];
    }


}
