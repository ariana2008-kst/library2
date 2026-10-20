<?php

namespace App\Services;

use App\Models\User;
use App\Models\Book;
use App\Models\Booking;
use App\Contracts\SmsSender;
use Illuminate\Validation\ValidationException;

class BookingService
{
    protected $smsSender;

    // Сервис-контейнер автоматически передаст сюда нужный SmsSender
    public function __construct(SmsSender $smsSender)
    {
        $this->smsSender = $smsSender;
    }

    public function create(User $user, Book $book, array $data): Booking
    {
        // Бизнес-правило: проверка на дубликат активной заявки от этого юзера
        $exists = Booking::where('user_id', $user->id)
            ->where('book_id', $book->id)
            ->whereIn('status', ['new', 'processed'])
            ->exists();

        if ($exists) {
            throw ValidationException::withMessages([
                'booking' => 'Вы уже забронировали эту книгу! Дождитесь обработки текущей заявки.',
            ]);
        }

        // Создаем бронь в базе
        $booking = Booking::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'phone'   => $data['phone'],
            'comment' => $data['comment'] ?? null,
            'status'  => 'new',
        ]);

        // Отправляем СМС-уведомление через интерфейс
        $this->smsSender->send($data['phone'], "Ваша заявка №{$booking->id} на книгу «{$book->title}» принята!");

        return $booking;
    }
}