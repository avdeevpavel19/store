<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required|unique:App\Models\Product|string|min:5|max:150',
            'description' => 'required|string|min:5|max:65000',
            'price' => 'required|integer|min:1|max:999999999999',
            'brand' => 'required',
            'color' => 'required',
            'properties' => 'required',
            'image' => 'required'
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
            'title.required' => 'Поле название товара обязательно к заполнению',
            'title.unique' => 'Товар с таким названием уже существует',
            'title.string' => 'Название товара должно быть в строковом формате',
            'title.min' => 'Название товара не должно быть меньше, чем 5 символов',
            'title.max' => 'Название товара не должно превышать 150 символов',

            'description.required' => 'Поле описание товара обязательно к заполнению',
            'description.string' => 'Описание товара должно быть в строковом формате',
            'description.min' => 'Описание товара не должно быть меньше, чем 5 символов',
            'description.max' => 'Описание товара не должно превышать 65000 символов',

            'price.required' => 'Поле стоимость товара обязательно к заполнению',
            'price.integer' => 'Стоимость товара должно быть в числовом формате',
            'price.min' => 'Стоимость товара не должен быть меньше, чем 1 символ',
            'price.max' => 'Стоимость товара не должно превышать 12 символов',

            'brand.required' => 'Поле бренд обязательно к заполнению',

            'color.required' => 'Поле цвет обязательно к заполнению',

            'properties.required' => 'Свойства товара обязательно к заполнению',


            'image.required' => 'Загрузите изображение товара',
        ];
    }
}
