<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule)
    {
        // Schedule the commands to run daily at 11:59 PM
        $schedule->command('attendance:mark-absent')->dailyAt('23:59');
        $schedule->command('attendance:mark-absent-manager')->dailyAt('23:59');
        $schedule->command('attendance:mark-absent-employee')->dailyAt('23:59');
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');
    }
}
