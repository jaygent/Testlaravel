<?php

namespace App\Console\Commands;

use App\Enums\StatusTask;
use App\Models\Task;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Console\Command;

class CleanUpTasksCommand extends Command
{
    protected $signature = 'clean:up-tasks {--date_lte= : YYYY-mm-dd}';

    protected $description = 'Command description';

    public function handle(): void
    {
        if (!empty($this->option('date_lte'))) {
            try {
                $date=Carbon::parse($this->option('date_lte'));
            } catch (InvalidFormatException $e) {
                $this->error('Invalid Format Date');
                return;
            }
        } else {
            $date=Carbon::now('Europe/Minsk')->subDay(30);
        }
        $count=Task::where('status', StatusTask::Backlog)
            ->whereDate('created_at', '<', $date)
            ->orWhereDate('updated_at', '<', $date)
            ->delete();
        $this->info("Found and deleted $count records in ".Carbon::now('Europe/Minsk'));
    }
}
