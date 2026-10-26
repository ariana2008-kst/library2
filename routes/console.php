<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use App\Models\Booking;

// 1. Команда расширенной статистики фонда
Artisan::command('catalog:stats', function () {
    $this->newLine();
    $this->info('==================================================');
    $this->info('      ОФИЦИАЛЬНАЯ СТАТИСТИКА ФОНДА БИБЛИОТЕКИ      ');
    $this->info('==================================================');
    
    $this->line('Всего зарегистрировано книг в фонде: ' . Book::count());
    $this->newLine();

    $this->warn('--- Распределение фонда по литературным жанрам ---');
    $genres = Genre::withCount('books')->get()->map(function ($genre) {
        return ['ID' => $genre->id, 'Название жанра' => $genre->name, 'Количество книг' => $genre->books_count];
    });
    $this->table(['ID', 'Название жанра', 'Количество книг'], $genres);
    $this->newLine();

    $this->warn('--- Зарегистрированные пользователи по ролям ---');
    $roles = User::select('role', \DB::raw('count(*) as total'))->groupBy('role')->get()->map(function ($u) {
        return ['Роль доступа' => $u->role, 'Количество аккаунтов' => $u->total];
    });
    $this->table(['Роль доступа', 'Количество аккаунтов'], $roles);
    $this->newLine();

    $this->warn('--- Активность заявок на бронирование книг ---');
    $bookings = Booking::select('status', \DB::raw('count(*) as total'))->groupBy('status')->get()->map(function ($b) {
        return ['Статус брони' => $b->status, 'Всего в базе' => $b->total];
    });
    $this->table(['Статус брони', 'Всего в базе'], $bookings);
    $this->info('==================================================');
})->purpose('Вывести подробную статистику фонда');

// --- ЗАДАНИЕ 3: ПЛАНИРОВЩИК ЗАДАЧ ПО РАСПИСАНИЮ ---

// Автоматически закрывать старые заявки каждый день в 3 часа ночи
Schedule::command('bookings:close-old --days=7')->dailyAt('03:00')->withoutOverlapping();

// Еженедельный запуск анонимного действия по понедельникам в 8:00
Schedule::call(function () {
    \Log::info('Планировщик проверил еженедельный статус архива библиотеки.');
})->weeklyOn(1, '08:00');