<?php

use Illuminate\Support\Facades\Route;

// Подключаем публичные контроллеры
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookController;

// Подключаем админские контроллеры под псевдонимами
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController as AdminBookController;

// Публичные статические страницы (Задание 2)
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/rules', [PageController::class, 'rules'])->name('rules');

// Публичный каталог книг (Задание 1)
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->whereNumber('id')->name('books.show');

// Статический редирект
Route::redirect('/main', '/');

// Группа админки с защитой по ключу (Задание 3)
Route::prefix('admin')->name('admin.')->middleware('admin_key')->group(function () {
    // Главная админки (вызывает __invoke автоматически)
    Route::get('/', DashboardController::class)->name('dashboard');
    
    // Ссылки на управление книгами в админке
    Route::get('/books', [AdminBookController::class, 'index'])->name('books.index');
    Route::get('/books/create', [AdminBookController::class, 'create'])->name('books.create');
});