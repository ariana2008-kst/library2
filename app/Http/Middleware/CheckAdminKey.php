<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminKey
{
    public function handle(Request $request, Closure $next): Response
    {
        // Проверяем, равен ли параметр "key" секретному слову "secret123"
        if ($request->query('key') !== 'secret123') {
            // Если ключа нет или он неверный — выдаем ошибку 403 с причиной
            abort(403, 'Не указан верный секретный ключ для входа в админку!');
        }

        return $next($request);
    }
}
