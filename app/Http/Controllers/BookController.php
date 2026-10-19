<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller
{
    // Список всех книг с поиском, фильтрами и пагинацией
    public function index(Request $request)
    {
        $sort = in_array($request->sort, ['title', 'year', 'price']) ? $request->sort : 'title';

        // Загружаем книги
        $books = Book::with('genre')
            ->search($request->q)
            ->when($request->genre, fn ($q, $g) => $q->where('genre_id', $g))
            ->orderBy($sort)
            ->paginate(9)
            ->withQueryString();

        // Берём жанры со счётчиком книг из базы
        $genres = Genre::withCount('books')->orderBy('name')->get();

        return view('items.index', compact('books', 'genres'));
    }

    // Карточка конкретной книги
    public function show(Book $book)
    {
        $relatedBooks = $book->genre ? $book->genre->books()->where('id', '!=', $book->id)->take(3)->get() : collect();

        return view('items.show', compact('book', 'relatedBooks'));
    }
}