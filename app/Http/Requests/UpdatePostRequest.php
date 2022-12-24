<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
    public function rules()
    {
        return [
            'post_heading' => ['required','max:20'],
            'description' => ['required','max:50'],
        ];
    }
    public function messages()
    {
        return [
            'post_heading.required' => 'Heading is needed',
            'post_heading.max' => 'Heading is too long',
            'description.required' => 'Description is needed',
        ];
    }
}
