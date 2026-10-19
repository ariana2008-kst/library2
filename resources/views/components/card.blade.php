@props(['title', 'url', 'badge' => null])

<article {{ $attributes->merge(['class' => 'card']) }} style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 6px; background: white; font-family: sans-serif;">
    <h3 style="margin-top: 0;">
        <a href="{{ $url }}" style="color: #2c3e50; text-decoration: none;">{{ $title }}</a>
        @if($badge)
            <span class="badge" style="background: #ff4a4a; color: white; padding: 2px 6px; font-size: 12px; border-radius: 4px; margin-left: 5px;">{{ $badge }}</span>
        @endif
    </h3>
    <div style="color: #555;">
        {{ $slot }}
    </div>
</article>