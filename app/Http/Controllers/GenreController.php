<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function show(Genre $genre)
    {
        $books = $genre->books()->paginate(9);
        return view('genres.show', compact('genre', 'books'));
    }
}