<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Список книг в админке
    public function index()
    {
        $booksList = config('catalog.items');
        return view('admin.books_index', ['items' => $booksList]);
    }

    // Страница создания новой книги
    public function create()
    {
        return view('admin.books_create');
    }
}