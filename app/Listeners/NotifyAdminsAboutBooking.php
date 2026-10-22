<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use App\Models\User;
use App\Notifications\NewBookingNotification;

class NotifyAdminsAboutBooking
{
    public function handle(BookingCreated $event): void
    {
        $booking = $event->booking;
        
        // Находим всех администраторов и отправляем им колокольчик
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewBookingNotification($booking));
        }
    }
}