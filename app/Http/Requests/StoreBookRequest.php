<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'    => ['required', 'string', 'max:255', 'unique:books,title'], // Проверка на уникальность названия книги!
            'author'   => ['required', 'string', 'max:255'],
            'year'     => ['required', 'integer', 'between:1800,2027'],
            'price'    => ['required', 'numeric', 'min:0'],
            'genre_id' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'  => 'Поле «Название книги» обязательно для заполнения.',
            'title.unique'    => 'Книга с таким названием уже зарегистрирована в фонде библиотеки.',
            'author.required' => 'Поле «Автор» обязательно для заполнения.',
            'price.required'  => 'Поле «Цена» обязательно для заполнения.',
            'price.numeric'   => 'Цена должна быть числом.',
            'price.min'       => 'Цена не может быть отрицательной.',
        ];
    }
}