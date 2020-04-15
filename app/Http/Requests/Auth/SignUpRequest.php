<?php

namespace App\Http\Requests\Auth;


use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;

class SignUpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' =>['required','unique:users'],
            'email'    => 'required|email|unique:users',
            'password' => [
                'required',
//                'confirmed',
                'string',
                'min:6',             // must be at least 6 characters in length
//                'regex:/[a-z]/',      // must contain at least one lowercase letter
//                'regex:/[A-Z]/',      // must contain at least one uppercase letter
//                'regex:/[0-9]/',      // must contain at least one digit
//                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
