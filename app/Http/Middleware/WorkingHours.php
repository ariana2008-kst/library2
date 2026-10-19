<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkingHours
{
    public function handle(Request $request, Closure $next): Response
    {
        // Принудительно блокируем доступ в любое время суток для скриншота!
        abort(403, 'Онлайн-бронирование закрыто! Библиотека работает только с 09:00 до 17:00.');

        return $next($request);
    }
}