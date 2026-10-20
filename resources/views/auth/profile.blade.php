@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
<div style="font-family: sans-serif; padding: 20px; max-width: 1000px; margin: 0 auto;">
    <h1>Личный кабинет читателя: {{ auth()->user()->name }}</h1>
    <p>Ваш рабочий E-mail: <strong>{{ auth()->user()->email }}</strong> | Текущая роль в системе: <u>{{ auth()->user()->role }}</u></p>

    <h2 style="margin-top: 40px;">История моих бронирований книг</h2>
    
    <table style="width: 100%; border-collapse: collapse; background: white; margin-top: 15px; border: 1px solid #ddd;">
        <thead>
            <tr style="background: #2c3e50; color: white; text-align: left;">
                <th style="padding: 12px; border: 1px solid #ddd;">№ Заявки</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Забронированная книга</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Контактный телефон</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Дата подачи</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Текущий статус</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $b)
                <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;">#{{ $b->id }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd;"><strong>{{ $b->book?->title ?? 'Удаленная книга' }}</strong></td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $b->phone }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $b->created_at->format('d.m.Y H:i') }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">
                        <span style="padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 13px;
                            background: {{ $b->status === 'new' ? '#fff3cd; color: #856404;' : ($b->status === 'processed' ? '#d4edda; color: #155724;' : '#fce8e6; color: #c5221f;') }}">
                            {{ $b->status === 'new' ? 'Новая' : ($b->status === 'processed' ? 'Принята' : 'Отклонена') }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="padding: 20px; text-align: center; color: #666;">Вы ещё не оставляли заявок на книги фонда.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection