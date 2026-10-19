<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Создаем два базовых жанра напрямую
        DB::table('genres')->insert([
            ['id' => 1, 'name' => 'Роман', 'description' => 'Художественная литература', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Фэнтези', 'description' => 'Магия и миры', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 2. Создаем ваши 5 базовых книг, жестко прописав им genre_id = 1
        DB::table('books')->insert([
            ['genre_id' => 1, 'title' => 'Абай жолы', 'author' => 'М. Ауэзов', 'year' => 1942, 'price' => 2500.00, 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 1, 'title' => 'Мастер и Маргарита', 'author' => 'М. Булгаков', 'year' => 1967, 'price' => 3200.00, 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 1, 'title' => 'Преступление и наказание', 'author' => 'Ф. Достоевский', 'year' => 1866, 'price' => 1800.00, 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 1, 'title' => 'Гарри Поттер', 'author' => 'Дж. Роулинг', 'year' => 1997, 'price' => 4500.00, 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 1, 'title' => 'Идиот', 'author' => 'Ф. Достоевский', 'year' => 1868, 'price' => 2100.00, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 3. Автоматически генерируем сверху еще 40 случайных книг фабрикой
        Book::factory(40)->recycle(Genre::all())->create();
    }
}