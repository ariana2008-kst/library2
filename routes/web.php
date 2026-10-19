<?php

use Illuminate\Support\Facades\Route;

// 1. Главная страница
Route::get('/', function () {
    return view('home');
})->name('home');

// 2. О проекте
Route::get('/about', function () {
    return view('about');
})->name('about');

// 3. Контакты — СЮДА МЫ ПОВЕСИЛИ ПРОВЕРКУ ВРЕМЕНИ ДЛЯ СКРИНШОТА 6!
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts')->middleware('working_hours');

// 4. Каталог книг (Задание 1)
Route::get('/books', function () {
    $booksList = config('catalog.items');
    return view('items.index', ['items' => $booksList]);
})->name('books.index');

// 5. Карточка книги с проверкой на 404 (Задание 1)
Route::get('/books/{id}', function (int $id) {
    $book = config("catalog.items.$id");
    if (!$book) {
        abort(404);
    }
    return view('items.show', ['id' => $id, 'book' => $book]);
})->whereNumber('id')->name('books.show');

// Статические правила и редирект (Задание 1)
Route::view('/rules', 'rules')->name('rules');
Route::redirect('/main', '/');

// Страница бронирования
Route::get('/booking', function () {
    return '<h1>Форма-заглушка: Записаться в библиотеку</h1><button>Записаться</button>';
})->name('booking');

// --- ЗАДАНИЕ 3 и 4 ---
// Группа маршрутов админки с защитой по секретному ключу ?key=secret123
Route::prefix('admin')->name('admin.')->middleware('admin_key')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::view('/stats', 'admin.stats')->name('stats');
});