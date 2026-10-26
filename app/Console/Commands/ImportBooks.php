<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;
use App\Models\Genre;

class ImportBooks extends Command
{
    protected $signature = 'books:import {file}';
    protected $description = 'Импорт книг из файла в базу данных фонда';

    public function handle()
    {
        $fileArgument = $this->argument('file');
        $baseName = pathinfo($fileArgument, PATHINFO_FILENAME);
        
        // Добавили точный путь поиска файла внутри папки Commands!
        $possiblePaths = [
            app_path('Console/Commands/' . $fileArgument),
            app_path('Console/Commands/' . $baseName . '.CSV'),
            base_path($fileArgument),
            base_path($baseName . '.CSV'),
            public_path($fileArgument),
            public_path($baseName . '.CSV'),
            app_path($fileArgument),
            app_path($baseName . '.CSV'),
        ];

        $filePath = null;
        foreach ($possiblePaths as $path) {
            if (file_exists($path)) {
                $filePath = $path;
                break;
            }
        }

        if (!$filePath) {
            $this->error("Файл «{$fileArgument}» не найден в папках проекта.");
            return 1;
        }

        $this->info("Файл успешно обнаружен по пути: {$filePath}");
        $this->info('Старт импорта книг...');

        $file = fopen($filePath, 'r');
        $added = 0;
        $skipped = 0;
        $rowNum = 0;

        while (($row = fgetcsv($file, 1000, ';')) !== false) {
            $rowNum++;
            
            if (count($row) < 5 || empty($row[3])) {
                $this->warn("Строка №{$rowNum} пропущена: Неполные данные.");
                $skipped++;
                continue;
            }

            [$title, $author, $year, $price, $genreId] = $row;

            if (!Genre::where('id', $genreId)->exists()) {
                $this->warn("Строка №{$rowNum} пропущена: Литературный жанр с ID {$genreId} не существует.");
                $skipped++;
                continue;
            }

            Book::create([
                'title'    => $title,
                'author'   => $author,
                'year'     => (int)$year,
                'price'    => (float)$price,
                'genre_id' => (int)$genreId,
                'user_id'  => 1
            ]);

            $added++;
        }

        fclose($file);
        $this->newLine();
        $this->info("Импорт завершен! Добавлено книг: {$added}, пропущено из-за ошибок: {$skipped}.");
        return 0;
    }
}