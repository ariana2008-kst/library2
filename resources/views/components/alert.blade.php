@php
    // Настраиваем цвета блоков в зависимости от выбранного типа
    $colors = match($type) {
        'success' => ['bg' => '#e6f4ea', 'border' => '#137333', 'text' => '#137333'],
        'error'   => ['bg' => '#fce8e6', 'border' => '#c5221f', 'text' => '#c5221f'],
        'warning' => ['bg' => '#fef7e0', 'border' => '#b06000', 'text' => '#b06000'],
        default   => ['bg' => '#e8f0fe', 'border' => '#1a73e8', 'text' => '#1a73e8'],
    };
@endphp

<div style="background: {{ $colors['bg'] }}; border-left: 5px solid {{ $colors['border'] }}; color: {{ $colors['text'] }}; padding: 15px; margin: 20px 0; border-radius: 4px; font-family: sans-serif; text-align: left; display: inline-block; width: 100%; box-sizing: border-box;">
    <span style="font-size: 18px; margin-right: 10px; font-weight: bold;">{{ $icon() }}</span>
    <span style="font-size: 15px;">{{ $slot }}</span>
</div>