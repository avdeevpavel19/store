<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'required|unique:App\Models\Brand|string|min:2|max:50',
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
            'name.unique' => 'Бренд с таким названием уже существует',
            'name.string' => 'Бренд должен быть в строковом формате',

            'name.min' => 'Название бренда не должно быть меньше, чем 2 символа',
            'name.max' => 'Название бренда не должно превышать 50 символов',
        ];
    }
}
