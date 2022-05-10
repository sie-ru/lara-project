<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
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

    public function rules()
    {
        return [
            'user_id' => [],
            'title' => ['required', 'string'],
            'preview' => [],
            'description' => ['required', 'string'],
            'cover' => ['image'],
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
