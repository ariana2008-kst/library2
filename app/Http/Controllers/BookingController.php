<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookingRequest;
use App\Services\BookingService;
use Illuminate\Support\Facades\Mail; // Подключаем почту
use App\Mail\BookingReceived; // Подключаем класс письма

class BookingController extends Controller
{
    public function store(StoreBookingRequest $request, Book $book, BookingService $service)
    {
        // Вызываем логику сервиса
        $booking = $service->create($request->user(), $book, $request->validated());

        // Задание 4.3: Отправляем красивое письмо пользователю на почту
        Mail::to($request->user()->email)->send(new BookingReceived($booking));

        return back()->with('success', "Заявка №{$booking->id} на книгу успешно отправлена! Письмо выслано на почту.");
    }

    public function profile()
    {
        $bookings = auth()->user()->bookings()->with('book')->latest()->get();
        return view('auth.profile', compact('bookings'));
    }
}