<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $book['title'] }}</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Главная</a> | 
        <a href="{{ route('about') }}">О проекте</a> | 
        <a href="{{ route('contacts') }}">Контакты</a> | 
        <a href="{{ route('books.index') }}">Книги</a> |
        <a href="{{ route('rules') }}">Правила</a>
    </nav>
    <h1>Информация о книге №{{ $id }}</h1>
    <ul>
        <li><strong>Название:</strong> {{ $book['title'] }}</li>
        <li><strong>Автор:</strong> {{ $book['author'] }}</li>
        <li><strong>Год издания:</strong> {{ $book['year'] }} г.</li>
    </ul>
    <p><a href="{{ route('books.index') }}">← Назад к списку каталога</a></p>
</body>
</html>