<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use App\Contracts\SmsSender;
use Illuminate\Contracts\Queue\ShouldQueue; // Подключили контракт очереди

class SendBookingSms implements ShouldQueue // Фоновую работу включили!
{
    protected $smsSender;

    public function __construct(SmsSender $smsSender)
    {
        $this->smsSender = $smsSender;
    }

    public function handle(BookingCreated $event): void
    {
        $booking = $event->booking;
        $this->smsSender->send(
            $booking->phone, 
            "Ваша заявка №{$booking->id} на книгу «{$booking->book->title}» принята!"
        );
    }
}