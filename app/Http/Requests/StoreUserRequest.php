<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'fio' => ['required', 'string', 'max:255'],
            'number' => ['required', "regex:/^(\+7|7|8)?[\s\-]?\(?\d{3}\)?[\s\-]?\d{1}[\s\-]?\d{3}[\s\-]?\d{2}[\s\-]?\d{2}$/"],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed']
        ];
    }

    public function messages()
    {
        return [
            'fio.required' => 'Вы забыли заполнить ФИО.',
            'number.required' => 'Проверьте правильность номера телефона.',
            'email.required' => 'Вы забыли указать email.',
            'password.required' => 'Вы забыли указать пароль.',
            'password.min' => 'Пароль должен быть 6 и более символов.',
        ];
    }
}
