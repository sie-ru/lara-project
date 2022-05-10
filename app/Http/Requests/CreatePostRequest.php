<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'user_id' => [],
            'title' => ['required', 'string'],
            'preview' => ['string'],
            'description' => ['required', 'string'],
            'cover' => ['required', 'image'],
            'tags' => ['array'],
            'comments_available' => []
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth('web')->user()->id
        ]);
    }
}
