@extends('layouts.admin')
@section('title', 'Управление жанрами')
@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; font-family: sans-serif;">
        <h1>Управление жанрами литературы</h1>
        <a href="{{ route('admin.genres.create') . '?key=secret123' }}" style="background: #1a73e8; color: white; padding: 10px 15px; text-decoration: none; font-weight: bold; border-radius: 4px;">+ Добавить жанр</a>
    </div>
    <table style="font-family: sans-serif; width: 100%; border-collapse: collapse; background: white;">
        <thead>
            <tr style="background: #34495e; color: white;">
                <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Название</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Кол-во книг</th>
                <th style="padding: 10px; border: 1px solid #ddd; text-align: center;">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $genre->id }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>{{ $genre->name }}</strong></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $genre->books_count }} шт.</td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center; display: flex; gap: 10px; justify-content: center;">
                        <a href="{{ route('admin.genres.edit', $genre) . '?key=secret123' }}" style="background: #f1f3f4; color: #1a73e8; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 13px; border: 1px solid #ddd;">Изменить</a>
                        <form method="POST" action="{{ route('admin.genres.destroy', $genre) . '?key=secret123' }}">
                            @csrf @method('DELETE')
                            <button type="submit" style="background: #fce8e6; color: #c5221f; border: 1px solid #fad2cf; padding: 5px 10px; border-radius: 4px; font-weight: bold; font-size: 13px; cursor: pointer;">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection