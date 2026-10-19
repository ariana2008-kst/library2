<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            ['genre_id' => 1, 'title' => 'Абай жолы', 'author' => 'М. Ауэзов', 'year' => 1942, 'price' => 2500.00, 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 1, 'title' => 'Мастер и Маргарита', 'author' => 'М. Булгаков', 'year' => 1967, 'price' => 3200.00, 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 1, 'title' => 'Преступление и наказание', 'author' => 'Ф. Достоевский', 'year' => 1866, 'price' => 1800.00, 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 2, 'title' => 'Гарри Поттер', 'author' => 'Дж. Роулинг', 'year' => 1997, 'price' => 4500.00, 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 1, 'title' => 'Идиот', 'author' => 'Ф. Достоевский', 'year' => 1868, 'price' => 2100.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}