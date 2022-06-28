<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
            'name' => 'required|unique:App\Models\Brand|string|min:4|max:50',
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
            'name.unique' => 'Цвет с таким названием уже существует',
            'name.string' => 'Цвет должен быть в строковом формате',

            'name.min' => 'Название цвета не должно быть меньше, чем 4 символа',
            'name.max' => 'Название цвета не должно превышать 50 символов',
        ];
    }
}
