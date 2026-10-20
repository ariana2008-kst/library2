<x-mail::message>
# Здравствуйте, {{ $booking->user->name }}!

Ваша заявка №{{ $booking->id }} на получение книги *«{{ $booking->book->title }}»* успешно принята архивной системой нашей библиотеки.

*Детали бронирования:*
* *Автор книги:* {{ $booking->book->author }}
* *Ваш контактный телефон:* {{ $booking->phone }}
* *Дата подачи заявки:* {{ $booking->created_at->format('d.m.Y H:i') }}

Мы свяжемся с вами в ближайшее время для подтверждения времени выдачи книги на руки.

<x-mail::button :url="route('profile')">
Перейти в мои заявки
</x-mail::button>

С уважением,<br>
Автоматическая система {{ config('app.name') }}
</x-mail::message>