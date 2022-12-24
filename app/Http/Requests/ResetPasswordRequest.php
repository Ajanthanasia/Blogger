<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'old_password' => ['required', 'current_password:web'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Current Password is Required',
            'password.required' => 'New Password is Required',
            'confirm_password.required' => 'Confirm Password is Required',
            'confirm_password.same' => 'Passwords are not matched!!!',
        ];
    }
}
