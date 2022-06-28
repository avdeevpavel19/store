<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|unique:App\Models\User|string|min:1|max:200|email',

            'password' => 'required|min:3|max:100|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Поле email не должен быть пустым',
            'email.min' => 'Email должен быть не меньше 1 символа',
            'email.max' => 'Email должен быть не больше 200 символов',
            'email.email' => 'Некорректный email',
            'email.unique' => 'Пользователь с таким email уже есть',

            'password.required' => 'Пароль не должен быть пустым',
            'password.confirmed' => 'Пароли не совпадают',
            'password.min' => 'Пароль должен быть не меньше 3 символов',
            'password.max' => 'Пароль должен быть не больше 100 символов',

            'password_confirmation.required' => 'Повторный пароль не должен быть пустым',
        ];
    }
}
