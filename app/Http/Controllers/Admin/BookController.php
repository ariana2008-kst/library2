<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Storage; // Подключаем фасад работы с файлами

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

    // 3. Сохранение новой книги и её обложки
    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();

        // Если файл обложки был загружен, сохраняем его на диск public
        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        // Привязываем запись к ID текущего авторизованного сотрудника
        $data['user_id'] = auth()->id();

        Book::create($data);

        return redirect()->route('admin.books.index')
            ->with('success', 'Книга успешно добавлена в фонд библиотеки вместе с обложкой!');
    }

    // 4. Страница редактирования книги
    public function edit(Book $book)
    {
        $genres = Genre::orderBy('name')->get();
        return view('admin.books.edit', compact('book', 'genres'));
    }

    // 5. Обновление данных и замена картинки книги
    public function update(UpdateBookRequest $request, Book $book)
    {
        $data = $request->validated();

        // Задание 2.1: Обработка чекбокса полного удаления обложки
        if ($request->boolean('remove_cover')) {
            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }
            $data['cover'] = null;
        }
        // Задание 2.1: Если загружена новая картинка — старую удаляем, новую сохраняем
        elseif ($request->hasFile('cover')) {
            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $book->update($data);

        return redirect()->route('admin.books.index')
            ->with('success', 'Карточка книги успешно обновлена!');
    }

    // 6. Списание книги и полное удаление файла с диска
    public function destroy(Book $book)
    {
        // Задание 2.2: Если у книги была обложка, удаляем файл с диска
        if ($book->cover) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return back()->with('success', 'Книга успешно удалена, файл обложки стёрт с диска!');
    }
}