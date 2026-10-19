<nav style="background: #eef2f3; padding: 15px; margin-bottom: 20px; font-family: sans-serif;">
    <a href="{{ route('home') }}" style="margin-right: 15px; text-decoration: none; color: #333; {{ request()->routeIs('home') ? 'font-weight: bold; border-bottom: 2px solid #333;' : '' }}">Главная</a>
    <a href="{{ route('books.index') }}" style="margin-right: 15px; text-decoration: none; color: #333; {{ request()->routeIs('books.*') ? 'font-weight: bold; border-bottom: 2px solid #333;' : '' }}">Каталог</a>
    <a href="{{ route('about') }}" style="margin-right: 15px; text-decoration: none; color: #333; {{ request()->routeIs('about') ? 'font-weight: bold; border-bottom: 2px solid #333;' : '' }}">О проекте</a>
    <a href="{{ route('contacts') }}" style="margin-right: 15px; text-decoration: none; color: #333; {{ request()->routeIs('contacts') ? 'font-weight: bold; border-bottom: 2px solid #333;' : '' }}">Контакты</a>
    <a href="{{ route('rules') }}" style="text-decoration: none; color: #333; {{ request()->routeIs('rules') ? 'font-weight: bold; border-bottom: 2px solid #333;' : '' }}">Правила</a>
</nav>