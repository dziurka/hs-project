<?php

namespace App;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;

class ConsoleKernel extends Kernel
{
    protected $commands = [
        //
    ];

    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Console/Commands');

        require base_path('routes/console.php');
    }
}
