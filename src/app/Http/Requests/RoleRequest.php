<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable',
        ];

        // A new role is created
        if($this->isMethod('post')) {
            $rules['name'] .= '|unique:roles';
        }

        // An existing role is updated
        if($this->isMethod('put')) {
            $roleId = $this->route('role');

            $rules['name'] .= '|unique:roles,name,'.$roleId->id;
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
            'name.required' => 'The role name field is required.',
            'name.string' => 'The role name must be a string.',
            'name.unique' => 'The role name has already been taken.',
            'name.max' => 'The role name may not be greater than 255 characters.',
        ];
    }
}
