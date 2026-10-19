<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends Model
{
    use HasFactory;

    // Поля, разрешенные для заполнения
    protected $fillable = ['name', 'description'];

    // Связь «один ко многим»: у одного жанра может быть много книг
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}