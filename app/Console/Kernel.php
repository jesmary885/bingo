<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

     protected $commands = [
        'App\Console\Commands\ReferidosCommand',
        'App\Console\Commands\CartonesReservados',

    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('referidos:pendientes')->everyMinute(); 
        $schedule->command('verif:cartones')->everyMinute();
        $schedule->command('cambio:monetario')->everyTwoHours();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
