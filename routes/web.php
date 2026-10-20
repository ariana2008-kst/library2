<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

// --- МАРШРУТЫ АУТЕНТИФИКАЦИИ (ЛАБА 7) ---
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:5,1'); 
});

// Выход из системы
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

// --- ГРУППА АДМИНКИ С НАСТОЯЩЕЙ ЗАЩИТОЙ КЛАССАМИ ---
Route::prefix('admin')->name('admin.')->middleware(['auth', 'can:admin-panel'])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('books', AdminBookController::class)->except('show');
    Route::resource('genres', \App\Http\Controllers\Admin\GenreController::class)->except('show');
});