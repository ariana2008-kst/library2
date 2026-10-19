<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // Список всех книг
    public function index()
    {
        $booksList = config('catalog.items');
        return view('items.index', ['items' => $booksList]);
    }

    // Карточка конкретной книги
    public function show(int $id)
    {
        $book = config("catalog.items.$id");
        
        // Короткая запись проверки: если книги нет — выдать 404
        abort_if(!$book, 404);

        return view('items.show', compact('id', 'book'));
    }
}