<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Библиотека')</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; max-width: 900px; margin: 0 auto; padding: 20px; color: #333; }
        .badge { background: #ff4a4a; color: white; padding: 2px 6px; font-size: 12px; border-radius: 4px; margin-left: 5px; }
    </style>
</head>
<body>
    @include('partials.nav')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>