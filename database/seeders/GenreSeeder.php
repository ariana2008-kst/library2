<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('genres')->insert([
            ['id' => 1, 'name' => 'Роман', 'description' => 'Художественная литература', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Фэнтези', 'description' => 'Фантастические миры и магия', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}