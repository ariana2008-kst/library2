@extends('layouts.app')

@section('title', 'Каталог книг')

@section('content')
<div style="display: flex; gap: 30px; font-family: sans-serif; padding: 20px;">
    
    <!-- Левая колонка: Поиск и фильтры -->
    <aside style="width: 250px; background: #f8f9fa; padding: 15px; border-radius: 6px; height: fit-content;">
        <h3>Поиск и фильтры</h3>
        
        <form action="{{ route('books.index') }}" method="GET" style="margin-bottom: 20px;">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Название или автор..." style="width: 100%; padding: 8px; box-sizing: border-box; margin-bottom: 10px;">
            <button type="submit" style="width: 100%; background: #1a73e8; color: white; border: none; padding: 8px; font-weight: bold; cursor: pointer; border-radius: 4px;">Найти</button>
            @if(request('q') || request('genre'))
                <a href="{{ route('books.index') }}" style="display: block; text-align: center; margin-top: 10px; color: #666; font-size: 13px;">Сбросить фильтры</a>
            @endif
        </form>

        <h4>Жанры:</h4>
        <ul style="list-style: none; padding: 0;">
            @foreach($genres as $genre)
                <li style="margin-bottom: 8px;">
                    <a href="{{ route('books.index', ['genre' => $genre->id]) }}" style="text-decoration: none; color: {{ request('genre') == $genre->id ? '#1a73e8; font-weight: bold;' : '#333' }}">
                        {{ $genre->name }} ({{ $genre->books_count }})
                    </a>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- Правая колонка: Список книг с обложками -->
    <section style="flex: 1;">
        <h1>Каталог книг библиотеки</h1>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
            @forelse ($books as $book)
                <x-card :title="$book->title" :url="route('books.show', $book->id)" :badge="$book->year < 1950 ? 'Классика' : null">
                    <!-- Задание 3.1: Вывод обложки или заглушки перед текстом -->
                    <div style="text-align: center; margin-bottom: 15px; background: #eee; border-radius: 4px; overflow: hidden;">
                        <img src="{{ $book->cover_url }}" alt="{{ $book->title }}" style="height: 220px; width: 100%; object-fit: cover;">
                    </div>
                    
                    <div style="font-size: 14px; color: #333;">
                        Автор: <strong>{{ $book->author }}</strong> — {{ $book->year }} г.<br>
                        Жанр: <em>{{ $book->genre?->name ?? 'Не указан' }}</em><br>
                        Цена: <strong style="color: #2ecc71;">{{ $book->price }} тг.</strong>
                    </div>
                </x-card>
            @empty
                <p>К сожалению, по вашему запросу ничего не найдено.</p>
            @endforelse
        </div>

        <div style="margin-top: 30px;">
            {{ $books->links() }}
        </div>
    </section>
</div>
@endsection