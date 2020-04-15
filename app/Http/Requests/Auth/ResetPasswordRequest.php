<?php

namespace App\Http\Requests\Auth;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;

class ResetPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
//            'password' => 'required|confirmed'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
