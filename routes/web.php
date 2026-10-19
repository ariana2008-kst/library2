<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController as AdminBookController;

// Публичные статические страницы
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/rules', [PageController::class, 'rules'])->name('rules');

// Публичный каталог книг на Eloquent (Задание 3 и 4)
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->whereNumber('book')->name('books.show');

// Страница конкретного жанра
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');

Route::redirect('/main', '/');

// Админка
Route::prefix('admin')->name('admin.')->middleware('admin_key')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/books', [AdminBookController::class, 'index'])->name('books.index');
    Route::get('/books/create', [AdminBookController::class, 'create'])->name('books.create');
});