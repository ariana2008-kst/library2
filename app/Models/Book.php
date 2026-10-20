<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute; // Исправлено: теперь этот класс подключен!

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_id', 
        'user_id', 
        'title', 
        'cover', 
        'author', 
        'year', 
        'price'
    ];

    // Метод локального поиска (Scoping)
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('title', 'like', "%{$search}%")
                         ->orWhere('author', 'like', "%{$search}%");
        }
        return $query;
    }

    // Связь: Книга принадлежит определенному жанру
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    // Связь: Книга принадлежит пользователю (сотруднику)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Аксессор вычисляемого свойства полного адреса обложки
    protected function coverUrl(): Attribute
    {
        return Attribute::get(fn () => $this->cover 
            ? asset('storage/' . $this->cover) 
            : asset('images/no-cover.png')
        );
    }
}