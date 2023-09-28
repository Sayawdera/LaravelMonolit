<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'data.name' => ['required', 'string'],
            'data.surname' => ['required', 'string'],
            'data.date' => ['required', 'date'],
            'data.photo' => ['required', 'string'],
            'data.phone' => ['required', 'string', 'unique:users,phone'],
            'data.email' => ['required', 'email', 'string', 'unique:users,email'],
            'data.code' => ['required', 'string'],
            'data.country_id' => ['nullable'],
            'data.password' => ['required'],
            'data.status' => ['nullable', 'numeric'],
        ];
    }
}
