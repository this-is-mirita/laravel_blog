<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            // для обновления емаил самому себе искучаем из правила себя и тянем из роута где user его id
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
            'role' => 'required|integer',
        ];
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
        ];
    }

}
