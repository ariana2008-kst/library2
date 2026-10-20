@extends('layouts.admin')

@section('title', 'Учет книг')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; font-family: sans-serif;">
        <h1>Учет книжного фонда (Панель сотрудника)</h1>
        <a href="{{ route('admin.books.create') . '?key=secret123' }}" style="background: #1a73e8; color: white; padding: 10px 15px; text-decoration: none; font-weight: bold; border-radius: 4px;">+ Добавить книгу</a>
    </div>
    
    <table style="font-family: sans-serif; width: 100%; border-collapse: collapse; background: white;">
        <thead>
            <tr style="background: #34495e; color: white;">
                <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Название книги</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Автор</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Год</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Цена</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Дата внесения</th>
                <th style="padding: 10px; border: 1px solid #ddd; text-align: center;">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $book->id }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>{{ $book->title }}</strong></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $book->author }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $book->year }} г.</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $book->price ?? '0.00' }} тг.</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $book->created_at->format('d.m.Y') }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center; display: flex; gap: 10px; justify-content: center;">
                        <!-- Кнопка Изменить -->
                        <a href="{{ route('admin.books.edit', $book) . '?key=secret123' }}" style="background: #f1f3f4; color: #1a73e8; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 13px; font-weight: bold; border: 1px solid #ddd;">Изменить</a>
                        
                        <!-- Форма Удаления -->
                        <form method="POST" action="{{ route('admin.books.destroy', $book) . '?key=secret123' }}" onsubmit="return confirm('Удалить эту книгу из базы данных фонда?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: #fce8e6; color: #c5221f; border: 1px solid #fad2cf; padding: 6px 12px; border-radius: 4px; font-size: 13px; font-weight: bold; cursor: pointer;">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px; font-family: sans-serif;">
        {{ $books->links() }}
    </div>
@endsection