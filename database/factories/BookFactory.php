<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'genre_id' => Genre::inRandomOrder()->first()?->id ?? 1,
            'title'    => rtrim(fake()->realText(20), '.'), // Случайное название
            'author'   => fake()->name(),                  // Случайный автор
            'year'     => fake()->numberBetween(1850, 2025), // Год
            'price'    => fake()->randomFloat(2, 1000, 5000), // Цена
        ];
    }
}