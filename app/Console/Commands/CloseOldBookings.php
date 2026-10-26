<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;

class CloseOldBookings extends Command
{
    // Описываем аргументы, параметры и флаг dry-run (Задание 2.1)
    protected $signature = 'bookings:close-old {--days=7} {--dry-run}';
    protected $description = 'Закрыть старые заявки на бронирование, которые висят без ответа';

    public function handle()
    {
        $days = (int) $this->option('days');
        $dryRun = $this->option('dry-run');

        // Ищем старые новые заявки
        $query = Booking::where('status', 'new')
            ->where('created_at', '<=', now()->subDays($days));

        $count = $query->count();

        if ($count === 0) {
            $this->info("Устаревших заявок (старше {$days} дней) не обнаружено.");
            return 0;
        }

        if ($dryRun) {
            $this->warn("[DRY RUN MODE] Найдено устаревших заявок: {$count}. Никаких изменений в БД не внесено.");
            return 0;
        }

        // Запрашиваем подтверждение у пользователя (Задание 2.3)
        if (!$this->confirm("Вы действительно хотите закрыть {$count} заявок?", true)) {
            $this->line('Операция отменена пользователем.');
            return 0;
        }

        $bookings = $query->get();

        // Полоса прогресса для отчёта (Задание 2.3)
        $this->withProgressBar($bookings, function ($booking) {
            $booking->update(['status' => 'rejected']);
            usleep(50000); // Небольшая визуальная задержка для полосы
        });

        $this->newLine();
        $this->info("Успешно закрыто заявок: {$count}.");
        return 0;
    }
}