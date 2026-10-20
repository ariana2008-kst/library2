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

// Публичный каталог книг на Eloquent
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->whereNumber('book')->name('books.show');
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');

Route::redirect('/main', '/');

// --- ГРУППА АДМИНКИ С ПОЛНЫМ РЕСУРСОМ (ЗАДАНИЕ 1) ---
Route::prefix('admin')->name('admin.')->middleware('admin_key')->group(function () {
    // Главная админки
    Route::get('/', DashboardController::class)->name('dashboard');
    
    // Ресурсный маршрут, который автоматически создаёт admin.books.edit, admin.books.index и т.д.
    Route::resource('books', AdminBookController::class)->except('show');
    
    // Ресурсный маршрут для жанров (Задание 6)
    Route::resource('genres', \App\Http\Controllers\Admin\GenreController::class)->except('show');
});