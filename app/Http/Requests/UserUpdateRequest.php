<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name'     => ['nullable', 'string'],
            'phone'    => ['nullable', 'numeric', 'unique:users'],
            'email'    => ['nullable', 'email', 'unique:users'],
            'password' => ['nullable', 'string', 'min:8'],
            'gender'   => ['nullable', 'string', 'in:male,female'],
            'position' => ['nullable', 'string'],
        ];
    }
}
