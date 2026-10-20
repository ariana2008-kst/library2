@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div style="font-family: sans-serif; max-width: 800px; margin: 0 auto; padding: 20px;">
    
    <div style="margin-bottom: 20px;">
        <a href="{{ route('books.index') }}" style="text-decoration: none; color: #1a73e8; font-weight: bold;">← Вернуться в каталог фонда</a>
    </div>

    <div style="display: flex; gap: 30px; background: white; padding: 30px; border: 1px solid #ddd; border-radius: 8px;">
        <!-- Обложка или её заглушка из ЛР8 -->
        <div style="flex: 0 0 200px;">
            <img src="{{ $book->cover_url }}" alt="{{ $book->title }}" style="width: 100%; height: 280px; object-fit: cover; border-radius: 4px; border: 1px solid #eee;">
        </div>

        <!-- Текстовое описание книги -->
        <div style="flex: 1;">
            <h1 style="margin-top: 0;">{{ $book->title }}</h1>
            <p style="font-size: 18px; color: #555;">Автор: <strong>{{ $book->author }}</strong></p>
            <hr style="border: 0; border-top: 1px solid #eee; margin: 15px 0;">
            
            <p>Год издания: <strong>{{ $book->year }} г.</strong></p>
            <p>Литературный жанр: <em>{{ $book->genre?->name ?? 'Не указан' }}</em></p>
            <p>Стоимость фонда: <strong style="color: #2ecc71; font-size: 20px;">{{ $book->price }} тг.</strong></p>
            <p style="color: #888; font-size: 13px; margin-top: 20px;">Запись внесена: {{ $book->created_at->format('d.m.Y') }}</p>
        </div>
    </div>

    <!-- --- ЗАДАНИЕ 2.2: ФОРМА БРОНИРОВАНИЯ КНИГИ --- -->
    <hr style="margin: 40px 0; border: 0; border-top: 1px solid #ddd;">

    @guest
        <!-- Виджет для неавторизованных гостей -->
        <div style="background: #fff3cd; color: #856404; padding: 15px; border-radius: 4px; font-weight: bold; margin-bottom: 20px; border: 1px solid #ffeeba;">
            💡 Чтобы забронировать эту книгу и забрать её в библиотеке, пожалуйста, <a href="{{ route('login') }}" style="color: #1a73e8; text-decoration: underline;">войдите в свой аккаунт</a>.
        </div>
    @endguest

    @auth
        <h3>Оставить заявку на бронирование книги в библиотеке:</h3>

        <!-- Уведомление об успешной отправке заявки -->
        @if (session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 4px; font-weight: bold; border: 1px solid #c3e6cb;">
                ✔️ {{ session('success') }}
            </div>
        @endif

        <!-- Блок вывода ошибки нарушения бизнес-правила из сервиса -->
        @error('booking')
            <div style="background: #fce8e6; border-left: 5px solid #c5221f; color: #c5221f; padding: 12px; margin-bottom: 20px; font-weight: bold; border-radius: 0 4px 4px 0;">
                ✖️ {{ $message }}
            </div>
        @enderror

        <form method="POST" action="{{ route('books.bookings', $book->id) }}" style="background: white; padding: 20px; border: 1px solid #ddd; border-radius: 6px; max-width: 500px; margin-bottom: 30px;">
            @csrf
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Ваш контактный телефон (Казахстан):</label>
                <input type="text" name="phone" placeholder="+77071234567" value="{{ old('phone') }}" style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid {{ $errors->has('phone') ? '#c5221f' : '#ddd' }}; border-radius: 4px;">
                @error('phone') <small style="color: #c5221f; font-weight: bold; display: block; margin-top: 5px;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Комментарий читателя (необязательно):</label>
                <textarea name="comment" rows="3" placeholder="Укажите желаемую дату визита или вопросы..." style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 4px;">{{ old('comment') }}</textarea>
            </div>

            <button type="submit" style="background: #1a73e8; color: white; border: none; padding: 10px 20px; font-size: 15px; font-weight: bold; border-radius: 4px; cursor: pointer;">Отправить заявку в библиотеку</button>
        </form>
    @endauth

</div>
@endsection