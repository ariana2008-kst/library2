<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'phone', 'comment', 'status'];

    // Связь: Заявка принадлежит конкретному читателю
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Связь: Заявка привязана к определенной книге
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}