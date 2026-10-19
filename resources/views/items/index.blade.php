<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог книг</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Главная</a> | 
        <a href="{{ route('about') }}">О проекте</a> | 
        <a href="{{ route('contacts') }}">Контакты</a> | 
        <a href="{{ route('books.index') }}">Книги</a> |
        <a href="{{ route('rules') }}">Правила</a>
    </nav>
    <h1>Каталог книг библиотеки</h1>
    <ul>
        @foreach ($items as $id => $item)
            <li>
                <a href="{{ route('books.show', $id) }}"><strong>{{ $item['title'] }}</strong></a> 
                — Автор: {{ $item['author'] }} ({{ $item['year'] }} г.)
            </li>
        @endforeach
    </ul>
</body>
</html>