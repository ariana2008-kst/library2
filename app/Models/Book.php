<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['genre_id', 'title', 'author', 'year', 'price'];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'price' => 'decimal:2',
        ];
    }

    // Книга принадлежит конкретному жанру
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    // Скоуп поиска по двум полям (название или автор)
    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        if (!$search) {
            return $query;
        }

        return $query->where(function (Builder $q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('author', 'like', "%{$search}%");
        });
    }

    // Скоуп фильтрации по годам (например, книги новее 1900 года)
    public function scopeModern(Builder $query): Builder
    {
        return $query->where('year', '>=', 1900);
    }
    //Связь: Книга принадлежит пользователю, который ее внес
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}