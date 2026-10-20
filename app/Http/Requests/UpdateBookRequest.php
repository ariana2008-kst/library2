<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'    => ['required', 'string', 'max:255'],
            'author'   => ['required', 'string', 'max:255'],
            'year'     => ['required', 'integer', 'between:1800,2027'],
            'price'    => ['required', 'numeric', 'min:0'],
            'genre_id' => ['required'],
            // Добавили правило проверки обложки при изменении карточки
            'cover'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле обязательно для заполнения.',
            'cover.image' => 'Файл должен быть изображением.',
            'cover.max' => 'Размер картинки не должен превышать 2 МБ.',
        ];
    }
}