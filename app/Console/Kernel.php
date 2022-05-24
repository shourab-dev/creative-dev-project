<?php

namespace App\Console;

use App\Mail\LeedMail;
use Illuminate\Support\Facades\Mail;
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
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $mailLeed = $this->sendLeed();
        // $schedule->command(Mail::to('shourab.cit.bd@gmail.com')->send(new LeedMail))->everyMinute();
        $schedule->call(function () {
            Mail::to('shourab.cit.bd@gmail.com')->send(new LeedMail);
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
    public function sendLeed()
    {
        Mail::to('shourab.cit.bd@gmail.com')->send(new LeedMail);
    }
}
