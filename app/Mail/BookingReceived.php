<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    // Передаем модель заявки в письмо
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Заявка №{$this->booking->id} на книгу принята в обработку",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.booking-received',
        );
    }
}