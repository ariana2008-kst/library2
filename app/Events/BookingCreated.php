<?php

namespace App\Events;

use App\Models\Booking;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookingCreated
{
    use Dispatchable, SerializesModels;

    // Свойство для хранения заявки
    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
}