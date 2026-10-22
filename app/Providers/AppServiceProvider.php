<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\SmsSender;
use App\Services\Sms\LogSmsSender;
use App\Services\Sms\NullSmsSender;
use App\Models\Book; // Подключили модель книг
use App\Observers\BookObserver; // Подключили наш наблюдатель

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Привязка интерфейса SmsSender к реализации в сервис-контейнере (ЛР9)
        $this->app->singleton(SmsSender::class, function () {
            return config('services.sms.driver') === 'log' 
                ? new LogSmsSender() 
                : new NullSmsSender();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Задание 2.2: Включаем автоматическое наблюдение за моделью Book!
        Book::observe(BookObserver::class);
    }
}