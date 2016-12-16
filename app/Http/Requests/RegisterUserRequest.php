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
        return true;
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
            'username'              =>  'required|alpha_num|unique:users',
            'password'				=>	'required|confirmed|between:4,12',
            'password_confirmation'	=> 	'required',
            'gender'				=>	'required|alpha',
            'month'					=>	'required|numeric|between:01,12',
            'day'					=>	'required|numeric|between:01,31',
            'year'					=>	'required|numeric|before:'.date('Y', $timestamp),
        ];
    }

    public function messages()
    {
        return [
            'firstname'				=>	'Please enter your firstname alphabetically',
            'lastname'				=>	'Please enter your lastname alphabetically',
            'email'					=> 	'Please enter your email alpha-numerically',
            'username'              =>  'Please enter your username',
            'password'				=>	'Please enter your pasword',
            'password_confirmation'	=> 	'Please confirm your password again',
            'gender'				=>	'Please enter your gender approiately',
            'month'					=>	'Select a month of birth',
            'day'					=>	'Select a day of birth',
            'year'					=>	'Select a year of birth',
        ];
    }


}
