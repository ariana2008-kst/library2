<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\SmsSender;
use App\Services\Sms\LogSmsSender;
use App\Services\Sms\NullSmsSender;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Задание 3.2: Привязка интерфейса SmsSender к реализации в сервис-контейнере
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
        //
    }
}