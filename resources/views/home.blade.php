<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная - Библиотека</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Главная</a> | 
        <a href="{{ route('books.index') }}">Каталог</a> | 
        <a href="{{ route('about') }}">О проекте</a> | 
        <a href="{{ route('contacts') }}">Контакты</a> |
        <a href="{{ route('rules') }}">Правила</a>
    </nav>
    <h1>Добро пожаловать в систему "Библиотека"</h1>
    <p>Сегодняшняя дата: {{ date('d.m.Y') }}</p>
</body>
</html>