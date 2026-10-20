<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Genre;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Создаем трех тестовых пользователей (Задание 1.3)
        User::factory()->create(['name' => 'Администратор', 'email' => 'admin@test.kz', 'role' => 'admin', 'password' => 'password']);
        User::factory()->create(['name' => 'Редактор фонда', 'email' => 'editor@test.kz', 'role' => 'editor', 'password' => 'password']);
        User::factory()->create(['name' => 'Обычный Читатель', 'email' => 'user@test.kz', 'role' => 'user', 'password' => 'password']);

        // Базовые жанры
        DB::table('genres')->insert([
            ['id' => 1, 'name' => 'Роман', 'description' => 'Художественная литература', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Фэнтези', 'description' => 'Магия и миры', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Генерируем 40 случайных книг, привязывая их к случайным пользователям и жанрам
        Book::factory(40)->recycle(Genre::all())->create([
            'user_id' => User::inRandomOrder()->first()->id
        ]);
    }
}