<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Журнал посещений
        $middleware->web(append: [
            \App\Http\Middleware\LogVisit::class,
        ]);

        // Псевдонимы для проверок
        $middleware->alias([
            'admin_key'     => \App\Http\Middleware\CheckAdminKey::class,
            'log_ip'        => \App\Http\Middleware\LogIp::class,
            'working_hours' => \App\Http\Middleware\WorkingHours::class, // Добавили эту строку
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();