<nav style="background: #eef2f3; padding: 15px; margin-bottom: 20px; font-family: sans-serif; display: flex; justify-content: space-between; align-items: center;">
    <div>
        <a href="{{ route('home') }}" style="margin-right: 15px; text-decoration: none; color: #333; {{ request()->routeIs('home') ? 'font-weight: bold;' : '' }}">Главная</a>
        <a href="{{ route('books.index') }}" style="margin-right: 15px; text-decoration: none; color: #333; {{ request()->routeIs('books.*') ? 'font-weight: bold;' : '' }}">Каталог</a>
        <a href="{{ route('about') }}" style="margin-right: 15px; text-decoration: none; color: #333; {{ request()->routeIs('about') ? 'font-weight: bold;' : '' }}">О проекте</a>
    </div>

    <div style="display: flex; align-items: center; gap: 15px;">
        @guest
            <!-- Ссылки для гостей -->
            <a href="{{ route('login') }}" style="text-decoration: none; color: #1a73e8; font-weight: bold;">Вход</a>
            <a href="{{ route('register') }}" style="text-decoration: none; color: #2ecc71; font-weight: bold;">Регистрация</a>
        @endguest

        @auth
            <!-- Текст для вошедшего администратора или редактора -->
            <span style="color: #555;">Пользователь: <strong style="color: #1a73e8;">{{ auth()->user()->name }}</strong> (Роль: {{ auth()->user()->role }})</span>
            
            <!-- Ссылка в скрытую панель учета -->
            <a href="{{ route('admin.books.index') }}" style="text-decoration: none; color: #e67e22; font-weight: bold; background: #fff3cd; padding: 5px 10px; border-radius: 4px; border: 1px solid #ffeba2;">Панель фонда</a>

            <!-- Форма безопасного выхода -->
            <form method="POST" action="{{ route('logout') }}" style="margin: 0; display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #e74c3c; font-weight: bold; cursor: pointer; padding: 0; margin-left: 10px;">Выйти</button>
            </form>
        @endauth
    </div>
</nav>