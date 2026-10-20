<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    // 1. Список всех книг в панели сотрудника
    public function index()
    {
        $books = Book::with('genre')->latest()->paginate(15);
        return view('admin.books_index', compact('books'));
    }

    // 2. Страница создания новой книги
    public function create()
    {
        $genres = Genre::orderBy('name')->get();
        return view('admin.books.create', compact('genres'));
    }

    // 3. Сохранение новой книги в базу данных
    public function store(StoreBookRequest $request)
    {
        Book::create($request->validated());

        return redirect()->route('admin.books.index', ['key' => 'secret123'])
            ->with('success', 'Книга успешно добавлена в фонд!');
    }

    // 4. Страница редактирования книги (Исправленный путь!)
    public function edit(Book $book)
    {
        $genres = Genre::orderBy('name')->get();
        return view('admin.books.edit', compact('book', 'genres'));
    }

    // 5. Обновление измененных данных книги
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());

        return redirect()->route('admin.books.index', ['key' => 'secret123'])
            ->with('success', 'Изменения в карточке книги успешно сохранены!');
    }

    // 6. Удаление книги из библиотечного фонда
    public function destroy(Book $book)
    {
        $book->delete();

        return back()->with('success', 'Книга успешно списана и удалена из базы данных!');
    }
}