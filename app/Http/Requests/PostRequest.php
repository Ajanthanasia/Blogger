<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'user_id' => ['required'],
            'post_heading' =>['required','max:20'],
            'post_img' => ['required'],
            'description' => ['required','max:50'],
        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'User Account is not Logined',
            'post_heading.required' => 'Heading is needed',
            'description.required' => 'Description is needed',
            'description.max' => 'Description allow to below 50 Characters.',
        ];
    }
}
