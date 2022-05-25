<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\LeedMail;
use App\Models\Seminar;
use Illuminate\Console\Command;
use App\Exports\SeminarLeedsExport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class SendLeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leedmail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sent out Leed Email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $todaySeminar = Seminar::with('leeds')->whereDate('date', Carbon::tomorrow())->where('status', true)->orderBy('date', 'ASC')->select('id', 'name', 'date', 'status')->get();

        if (count($todaySeminar) > 0) {

            $userMails = User::whereHas('roles', function ($q) {
                $q->whereHas('permissions', function ($query) {
                    $query->where('name', 'manage seminar');
                });
            })->pluck('email')->toArray();
            $filePath = [];
            foreach ($todaySeminar as $seminar) {

                Excel::store(new SeminarLeedsExport($seminar->id, $seminar->name), "export/$seminar->name seminar-leeds.xlsx", 'public');
                $filePath[] = public_path("/storage/export/$seminar->name seminar-leeds.xlsx");
            }
            foreach ($userMails as $email) {
                Mail::to($email)->send(new LeedMail($filePath));
            }

           
        }
    }
}
