<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Доступ запрещен - 403</title>
</head>
<body style="text-align: center; padding-top: 50px; font-family: sans-serif;">
    <h1 style="font-size: 72px; color: #d9534f;">403</h1>
    <h2>Доступ строго ограничен!</h2>
    <p style="font-size: 20px; color: #555;">Причина: <strong>{{ $exception->getMessage() }}</strong></p>
    <p><a href="{{ route('home') }}">Уйти на главную</a></p>
</body>
</html>