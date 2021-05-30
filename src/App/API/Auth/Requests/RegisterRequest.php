<?php

namespace App\API\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return !Auth::check();
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'regex:/(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/',
                'max:30',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*?[A-ZŻŹĆĄŚĘŁÓŃ])(?=.*?[a-zżźćńółęąś])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/',
                'confirmed'
            ],
            'name' => [
                'required',
                'string',
                'between:3,250'
            ]
        ];
    }
}
