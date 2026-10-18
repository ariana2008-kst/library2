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
        <a href="{{ route('books.index') }}">Книги</a>
    </nav>
    <h1>Список доступных книг</h1>
    <ul>
        @foreach($books as $key => $book)
            <li>
                <a href="{{ route('books.show', ['id' => $key + 1]) }}">{{ $book }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>