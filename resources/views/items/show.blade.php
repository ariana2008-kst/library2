@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div style="font-family: sans-serif;">
    <h1>{{ $book->title }}</h1>
    <div style="background: #f8f9fa; padding: 20px; border-radius: 6px; margin-bottom: 30px;">
        <p><strong>Автор:</strong> {{ $book->author }}</p>
        <p><strong>Год издания:</strong> {{ $book->year }} г.</p>
        <p><strong>Жанр:</strong> {{ $book->genre?->name ?? 'Не указан' }}</p>
        <p><strong>Стоимость:</strong> {{ $book->price }} тг.</p>
    </div>

    <!-- Задание 4. Связанные записи (Блок "Еще из этой категории") -->
    <h3>Рекомендуем также почитать:</h3>
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
        @forelse($relatedBooks as $relBook)
            <div style="border: 1px solid #ddd; padding: 15px; border-radius: 4px; background: white;">
                <h4><a href="{{ route('books.show', $relBook->id) }}" style="text-decoration: none; color: #1a73e8;">{{ $relBook->title }}</a></h4>
                <small>Автор: {{ $relBook->author }}</small>
            </div>
        @empty
            <p style="color: #666; id: 'empty';">Других книг в этом жанре пока нет.</p>
        @endforelse
    </div>

    <p style="margin-top: 30px;"><a href="{{ route('books.index') }}">← Назад к списку каталога</a></p>
</div>
@endsection