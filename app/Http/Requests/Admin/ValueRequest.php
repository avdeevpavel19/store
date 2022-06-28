<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ValueRequest extends FormRequest
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
            'name' => 'required|unique:App\Models\CategoryPropertyValue|string|min:2|max:50',
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
            'name.required' => 'Поле обязательно к заполнению',
            'name.unique' => 'Значение свойства с таким названием уже существует',
            'name.string' => 'Значение свойства должно быть в строковом формате',

            'name.min' => 'Название значения не должно быть меньше, чем 2 символа',
            'name.max' => 'Название значения не должно быть больше чем 50 символов',
        ];
    }
}
