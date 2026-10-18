<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Главная</a> | 
        <a href="{{ route('about') }}">О проекте</a> | 
        <a href="{{ route('contacts') }}">Контакты</a> | 
        <a href="{{ route('books.index') }}">Книги</a>
    </nav>
    <h1>Добро пожаловать в систему "{{ config('app.name') }}"</h1>
    <p>Сегодняшняя дата: {{ now()->format('d.m.Y') }}</p>
</body>
</html>