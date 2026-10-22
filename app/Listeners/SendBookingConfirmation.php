<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use App\Mail\BookingReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue; // Подключили контракт очереди

class SendBookingConfirmation implements ShouldQueue // Фоновую работу включили!
{
    public function handle(BookingCreated $event): void
    {
        $booking = $event->booking;
        Mail::to($booking->user->email)->send(new BookingReceived($booking));
    }
}