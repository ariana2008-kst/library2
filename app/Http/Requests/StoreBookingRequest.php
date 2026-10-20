<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Регулярное выражение строго для номеров Казахстана
            'phone' => ['required', 'string', 'regex:/^\+7\d{10}$/'],
            'comment' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'Поле «Телефон» обязательно для заполнения.',
            'phone.regex' => 'Формат телефона должен быть строго казахстанского образца: +7XXXXXXXXXX',
        ];
    }
}