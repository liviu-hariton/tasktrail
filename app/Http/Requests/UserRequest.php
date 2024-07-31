<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'numeric|min_digits:10|max_digits:10',
            'is_active' => 'boolean',
            'send_login' => 'boolean',
            'avatar' => [
                'sometimes',
                File::image()->max(2048)->extensions(['jpg', 'jpeg', 'png']),
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password field is required.',
            'firstname.required' => 'The first name is required.',
            'firstname.string' => 'The first name must be a string.',
            'firstname.max' => 'The first name may not be greater than 255 characters.',
            'lastname.string' => 'The last name must be a string.',
            'lastname.required' => 'The last name is required.',
            'lastname.max' => 'The last name may not be greater than 255 characters.',
            'phone.numeric' => 'The phone number must be numeric.',
            'phone.min_digits' => 'The phone number must be exactly 10 digits.',
            'phone.max_digits' => 'The phone number must be exactly 10 digits.',
            'avatar.image' => 'The avatar must be an image.',
            'avatar.max' => 'The avatar may not be greater than 2048 kilobytes.',
            'avatar.extensions' => 'The avatar must be a file of type: jpg, jpeg, png.',
        ];
    }
}
