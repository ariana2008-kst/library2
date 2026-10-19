<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админка — @yield('title')</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; background: #f4f6f9; }
        .admin-nav { background: #2c3e50; padding: 15px; color: white; }
        .admin-nav a { color: #ecf0f1; text-decoration: none; margin-right: 20px; font-weight: bold; }
        .container { padding: 30px; max-width: 1000px; margin: 0 auto; }
        table { width: 100%; border-collapse: collapse; background: white; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #34495e; color: white; }
        .new-badge { background: #2ecc71; color: white; padding: 2px 6px; font-size: 11px; border-radius: 3px; }
    </style>
</head>
<body>
    <nav class="admin-nav">
        <a href="{{ route('admin.dashboard') . '?key=secret123' }}">Панель контроля</a>
        <a href="{{ route('admin.books.index') . '?key=secret123' }}">Книги фонда</a>
        <a href="{{ route('home') }}" style="float: right; color: #e74c3c;">Выйти на сайт</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>