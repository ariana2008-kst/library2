<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\GenreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Все маршруты здесь автоматически получают префикс /api/
|
*/

// Группа v1 с лимитом 60 запросов в минуту и уникальным именем (Задание 1.3)
Route::prefix('v1')->name('api.v1.')->middleware('throttle:60,1')->group(function () {
    
    // Проверочный ping-маршрут с открытой кодировкой кириллицы (Задание 5.3)
    Route::get('/ping', function () {
        return response()->json([
            'status' => 'Библиотека работает в штатном режиме',
            'time' => now()->toIso8601String()
        ], 200, [], JSON_UNESCAPED_UNICODE);
    })->name('ping');

});