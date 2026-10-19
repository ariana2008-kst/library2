@extends('layouts.app')

@section('title', 'Каталог книг')

@section('content')
    <h1>Каталог книг библиотеки</h1>

    <div class="catalog-list">
        @forelse ($items as $id => $item)
            <x-card 
                :title="$item['title']" 
                :url="route('books.show', $id)" 
                :badge="$item['year'] < 1950 ? 'Классика' : null"
            >
                Автор: <strong>{{ $item['author'] }}</strong> — {{ $item['year'] }} год издания.
            </x-card>
        @empty
            <p>К сожалению, в каталоге пока нет доступных книг.</p>
        @endforelse
    </div>
@endsection