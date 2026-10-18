<?php

use Illuminate\Support\Facades\Route;

// 1. Главная страница
Route::get('/', function () {
    return view('home');
})->name('home');

// 2. Страница "О проекте"
Route::get('/about', function () {
    return view('about');
})->name('about');

// 3. Страница "Контакты"
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

// 4. Каталог книг (Список сущностей)
Route::get('/books', function () {
    $booksList = ['Мастер и Маргарита', 'Преступление и наказание', 'Гарри Поттер'];
    return view('books.index', ['books' => $booksList]);
})->name('books.index');

// 5. Просмотр конкретной книги по её цифровому ID
Route::get('/books/{id}', function ($id) {
    return view('books.show', ['id' => $id]);
})->name('books.show')->whereNumber('id');