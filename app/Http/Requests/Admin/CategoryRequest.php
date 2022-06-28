<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|unique:App\Models\Category|string|min:2|max:50',
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
            'name.unique' => 'Категория с таким названием уже существует',
            'name.string' => 'Категория должна быть в строковом формате',

            'name.min' => 'Название категории не должно быть меньше, чем 2 символа',
            'name.max' => 'Название категории не должно превышать 50 символов',
        ];
    }
}
