<?php

namespace App\Http\Requests\Auth;

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
     * @return array
     */
    public function rules()
    {
        return [
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
            'password.required' => 'Пароль не должен быть пустым',
            'password.confirmed' => 'Пароли не совпадают',
            'password.min' => 'Пароль должен быть не меньше 3 символов',
            'password.max' => 'Пароль должен быть не больше 100 символов',
            'password_confirmation.required' => 'Повторный пароль не должен быть пустым',
        ];
    }
}
