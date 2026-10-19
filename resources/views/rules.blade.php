<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Правила библиотеки</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Главная</a> | 
        <a href="{{ route('about') }}">О проекте</a> | 
        <a href="{{ route('contacts') }}">Контакты</a> | 
        <a href="{{ route('books.index') }}">Книги</a> |
        <a href="{{ route('rules') }}">Правила</a>
    </nav>
    <h1>Правила пользования библиотекой</h1>
    <p>1. Книги выдаются на срок до 14 дней.</p>
    <p>2. Бережно относитесь к библиотечному фонду.</p>
</body>
</html>