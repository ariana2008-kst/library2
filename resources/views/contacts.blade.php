<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Контакты - {{ config('app.name') }}</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Главная</a> | 
        <a href="{{ route('about') }}">О проекте</a> | 
        <a href="{{ route('contacts') }}">Контакты</a> | 
        <a href="{{ route('books.index') }}">Книги</a>
    </nav>
    <h1>Контакты</h1>
    <p>Адрес нашей библиотеки: Университетский проспект, д. 5</p>
    <p>Телефон: +7 (999) 123-45-67</p>
</body>
</html>