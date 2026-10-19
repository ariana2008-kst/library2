@extends('layouts.app')

@section('title', 'Каталог книг')

@section('content')
    <h1>Каталог книг библиотеки</h1>
    <ul>
        @forelse ($items as $id => $item)
            <li style="margin-bottom: 10px;">
                {{ $loop->iteration }}. 
                <a href="{{ route('books.show', $id) }}"><strong>{{ $item['title'] }}</strong></a> 
                — Автор: {{ $item['author'] }} ({{ $item['year'] }} г.)

                @if ($item['year'] < 1950)
                    <span class="badge">Классика</span>
                @endif
            </li>
        @empty
            <p>К сожалению, в каталоге пока нет доступных книг.</p>
        @endforelse
    </ul>
@endsection