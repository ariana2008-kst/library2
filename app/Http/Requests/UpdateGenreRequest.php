<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGenreRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('genres', 'name')->ignore($this->route('genre'))],
            'description' => ['nullable', 'string'],
        ];
    }

    public function messages(): array { return ['required' => 'Поле «:attribute» обязательно.', 'unique' => 'Такой жанр уже существует.']; }
    public function attributes(): array { return ['name' => 'Название жанра', 'description' => 'Описание']; }
}