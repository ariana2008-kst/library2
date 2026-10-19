<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        // Записываем визит ДО того, как сработает страница
        Log::info('Визит', [
            'url' => $request->fullUrl(),
            'ip'  => $request->ip(),
        ]);

        return $next($request);
    }
}