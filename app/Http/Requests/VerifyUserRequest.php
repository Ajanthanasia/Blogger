<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyUserRequest extends FormRequest
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
            'name' => ['required','max:20'],
            'username' => ['required','max:30'],
            'email' => ['required','unique:users,email','email','max:20'],
            'password' => [
                'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
            ],
            'conpassword' => ['required','same:password'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name is Required',
            'username.required' => 'User Name is Required',
            'email.required' => 'Email is Required',
            'email.email' => 'Email type is needed',
            'email.unique' => 'Email already used',
            'password.required' => 'Password is Required',
            'password.min' => 'Password minimum length is 8',
            'conpassword.required' => 'Confirm is needed',
            'conpassword.same' => 'Password is not matched',
        ];
    }
}
