<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Доступ запрещен - 403</title>
</head>
<body style="text-align: center; padding-top: 80px; max-width: 600px; margin: 0 auto;">
    <h1 style="font-size: 72px; color: #d9534f; margin-bottom: 10px; font-family: sans-serif;">403</h1>
    
    <x-alert type="warning">
        Доступ строго ограничен! Причина: <strong>{{ $exception->getMessage() }}</strong>
    </x-alert>

    <p style="margin-top: 20px;"><a href="{{ route('home') }}" style="font-size: 16px; font-family: sans-serif;">← Уйти на Главную страницу</a></p>
</body>
</html>