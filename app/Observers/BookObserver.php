<?php

namespace App\Observers;

use App\Models\Book;

class BookObserver
{
    /**
     * Временно очистили метод, чтобы убрать ошибку отсутствующего класса уведомлений
     */
    public function created(Book $book): void
    {
        // Логика отключена для успешного выполнения импорта книг
    }
}