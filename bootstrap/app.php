<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', // Активирован файл API путей
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Настройки посредников по умолчанию
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Задание 1.2: Ошибки в /api/* — всегда отдаем в JSON, даже без заголовка Accept
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request, Throwable $e) => $request->is('api/*') || $request->expectsJson()
        );

        // Кастомная обработка ошибки 404 (Не найдено) для программных запросов
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Запрашиваемая запись фонда или адрес не найдены в системе'
                ], 404, [], JSON_UNESCAPED_UNICODE);
            }
        });
    })->create();