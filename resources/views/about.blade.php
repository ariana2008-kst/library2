<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>О проекте</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Главная</a> | 
        <a href="{{ route('books.index') }}">Каталог</a> | 
        <a href="{{ route('about') }}">О проекте</a> | 
        <a href="{{ route('contacts') }}">Контакты</a> |
        <a href="{{ route('rules') }}">Правила</a>
    </nav>
    <h1>О проекте "Библиотека"</h1>
    <p>Это учебный проект веб-разработки на Laravel для каталогизации и учета книг.</p>
</body>
</html>