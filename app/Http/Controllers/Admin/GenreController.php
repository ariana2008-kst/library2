<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::withCount('books')->orderBy('name')->paginate(10);
        return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(StoreGenreRequest $request)
    {
        Genre::create($request->validated());
        return redirect()->route('admin.genres.index', ['key' => 'secret123'])->with('success', 'Жанр успешно создан!');
    }

    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());
        return redirect()->route('admin.genres.index', ['key' => 'secret123'])->with('success', 'Жанр успешно обновлен!');
    }

    public function destroy(Genre $genre)
    {
        // Жёсткая проверка наличия привязанных книг (Задание 6.2)
        if ($genre->books()->exists()) {
            return back()->with('error', 'Нельзя удалить жанр: к нему привязаны книги фонда!');
        }

        $genre->delete();
        return back()->with('success', 'Жанр успешно удален.');
    }
}