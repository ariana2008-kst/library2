<?php

namespace App\Observers;

use App\Models\Book;
use App\Models\User;
use App\Notifications\NewBookingNotification; // Используем готовый класс уведомлений

class BookObserver
{
    /**
     * Срабатывает автоматически СРАЗУ после создания новой книги в базе данных.
     */
    public function created(Book $book): void
    {
        // Находим всех администраторов системы
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            // Отправляем колокольчик-уведомление в базу данных
            $admin->notify(new \Illuminate\Notifications\Notification()); 
            // Для простоты и тестов используем базовый класс или наш кастомный:
            $admin->notify(new NewBookingNotification($book->bookings()->first() ?? new \App\Models\Booking()));
        }
    }
}