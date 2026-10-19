@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <h1>Добро пожаловать в систему "Библиотека"</h1>
    <p>Популярные книги фонда на сегодня ({{ date('d.m.Y') }}):</p>

    <div class="featured-books">
        <x-card class="card-wide" title="Абай жолы" :url="route('books.show', 1)" badge="Классика">
            Выдающееся произведение Мухтара Ауэзова.
        </x-card>

        <x-card class="card-wide" title="Мастер и Маргарита" :url="route('books.show', 2)">
            Знаменитый роман Михаила Булгакова.
        </x-card>

        <x-card class="card-wide" title="Гарри Поттер" :url="route('books.show', 4)">
            Мировой бестселлер Джоан Роулинг.
        </x-card>
    </div>
@endsection