<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    // Принимаем тип уведомления (по умолчанию 'info')
    public function __construct(public string $type = 'info') {}

    // Метод автоматически выбирает иконку в зависимости от типа
    public function icon(): string
    {
        return match ($this->type) {
            'success' => '✔️',
            'error'   => '✖️',
            'warning' => '⚠️',
            default   => 'ℹ️',
        };
    }

    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}