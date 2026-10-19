<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Генерируем уникальное случайное слово для названия жанра
            'name' => fake()->unique()->word(),
            // Генерируем случайное предложение для описания
            'description' => fake()->sentence(5),
        ];
    }
}