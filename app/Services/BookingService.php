<?php

namespace App\Services;

use App\Models\User;
use App\Models\Book;
use App\Models\Booking;
use Illuminate\Validation\ValidationException;

class BookingService
{
    /**
     * Создание новой заявки на бронирование книги в фонде библиотеки.
     * Проверяет жесткое бизнес-правило на дубликаты активных заявок.
     */
    public function create(User $user, Book $book, array $data): Booking
    {
        // Бизнес-правило: проверка на наличие уже существующей активной заявки от этого читателя
        $exists = Booking::where('user_id', $user->id)
            ->where('book_id', $book->id)
            ->whereIn('status', ['new', 'processed'])
            ->exists();

        if ($exists) {
            throw ValidationException::withMessages([
                'booking' => 'Вы уже забронировали эту книгу! Дождитесь обработки вашей текущей активной заявки.',
            ]);
        }

        // Создаем и возвращаем запись брони из базы данных (без отправки СМС, за это теперь отвечают слушатели)
        return Booking::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'phone'   => $data['phone'],
            'comment' => $data['comment'] ?? null,
            'status'  => 'new',
        ]);
    }
}