<?php

namespace App\Http\Requests\Auth;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
