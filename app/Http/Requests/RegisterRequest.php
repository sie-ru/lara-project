<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            "name" => ['required', 'string', 'unique:users,name'],
            "email" => ['required', 'email', 'string', 'unique:users,email'],
            "password" => ['required', 'confirmed'],
            'telegram' => ['unique:users,telegram'],
            'avatar' => []
        ];
    }

    public function messages() {
        return [
            "name.required" => 'Filed "name" is required',
            "name.unique" => 'User with this "username" already exists',
            "email.required" => 'Filed "email" is required',
            "email.unique" => 'User with this "email" already exists',
            "password.required" => 'Filed "password" is required',
            'avatar.mimes' => 'Only JPG, PNG, WEBP format'
        ];
    }
}


//'image', 'mimes:jpg,png,webp', 'max:2048','dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
