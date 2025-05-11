<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|max:255',
            'role' => 'required|integer',
        );
    }
    public function messages()
    {
        return [
            'name.required' => 'обязательно для заполнения ',
            'name.string' => 'емаил должен быть строкой ',

            'email.required' => 'обязательно для заполнения ',
            'email.string' => 'емаил должен быть строкой ',
            'email.email' => 'почта должна быть в формате xxxx@xxxx.xx ',
            'email.unique' => 'пользователь с тами емаил существует',

            'password.required' => 'обязательно для заполнения ',
            'password.string' => 'пароль должен быть строкой ',
        ];
    }
}
