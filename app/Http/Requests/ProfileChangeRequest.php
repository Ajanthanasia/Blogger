<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileChangeRequest extends FormRequest
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
            'name' => ['required','max:30'],
            'username' => ['required','max:30'],
            'email' => ['required','max:30'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name is Required',
            'username.required' => 'User Name is Required',
            'email.required' => 'Email is Required',
        ];
    }
}
