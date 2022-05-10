<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('web')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ['required'],
            "email" => ['required'],
            "avatar" => []
        ];
    }

    public function messages() {
        return [
            "name.required" => 'Filed "name" is required',
            "name.unique" => 'User with this "username" already exists',
            "email.required" => 'Filed "email" is required',
            "email.unique" => 'User with this "email" already exists',
        ];
    }
}
