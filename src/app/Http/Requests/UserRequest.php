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
        $rules = [
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'nullable|numeric|min_digits:10|max_digits:10',
            'is_active' => 'boolean',
            'send_login' => 'boolean',
            'avatar' => [
                'nullable',
                File::image()->max(2048)->extensions(['jpg', 'jpeg', 'png']),
            ],
        ];

        // A new user is created
        if($this->isMethod('post')) {
            $rules['username'] .= '|unique:users';
            $rules['email'] .= '|unique:users';
            $rules['password'] = 'required|min:8';
        }

        // An existing user is updated
        if($this->isMethod('put')) {
            $userId = $this->route('user');

            $rules['username'] .= '|unique:users,username,'.$userId->id;
            $rules['email'] .= '|unique:users,email,'.$userId->id;
            $rules['password'] = 'nullable|min:8';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'username.required' => 'The username field is required.',
            'username.string' => 'The username must be a string.',
            'username.unique' => 'The username has already been taken.',
            'username.max' => 'The username may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.min_digits' => 'The password must be at least 8 characters.',
            'firstname.required' => 'The first name is required.',
            'firstname.string' => 'The first name must be a string.',
            'firstname.max' => 'The first name may not be greater than 255 characters.',
            'lastname.required' => 'The last name is required.',
            'lastname.string' => 'The last name must be a string.',
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
