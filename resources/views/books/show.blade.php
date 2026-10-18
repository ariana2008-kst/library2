<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Просмотр книги</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Главная</a> | 
        <a href="{{ route('about') }}">О проекте</a> | 
        <a href="{{ route('contacts') }}">Контакты</a> | 
        <a href="{{ route('books.index') }}">Книги</a>
    </nav>
    <h1>Карточка книги</h1>
    <p>Вы смотрите книгу с уникальным инвентарным ID номером: <strong>{{ $id }}</strong></p>
    <p><a href="{{ route('books.index') }}">← Вернуться к списку книг</a></p>
</body>
</html>