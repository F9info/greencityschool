<?php

namespace App\Console;

use App\Models\MailTemplates;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Mail\DynamicEmail;
use App\Models\User;
use Carbon\Carbon;
use Mail;

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
        // $users = User::where(function ($q) {
        //     $q->where(function ($q1) {
        //         $q1->whereDate('expiry_date', Carbon::today()->addDays(7)->toDateString())->where('renewal_reminder_mail_sent', NULL);
        //     })
        //         ->orWhere(function ($q1) {
        //             $q1->where('expiry_date', '<', Carbon::now())->whereDate('renewal_reminder_mail_sent_date', Carbon::today()->addDays(-30)->toDateString())->where('renewal_reminder_mail_sent', 1);
        //         });
        // })->get();

        $users = User::whereDate('expiry_date', Carbon::today()->addDays(7)->toDateString())->where('renewal_reminder_mail_sent', NULL)->get();

        $schedule->call(function () use ($users) {
            $mailTemplate = MailTemplates::where('heading', 'Membership Ends Reminder')->first();
            foreach ($users as $user) {
                $variable = ["[Full Name]", "[MEMBERID]", "[MTYPE]"];
                $replace   = [$user->first_name . " " . $user->last_name, $user->id, $user->personalDetails->membershipType->membership_name];
                $finalTemplate = str_replace($variable, $replace, $mailTemplate->description);
                Mail::to($user->email)->send(new DynamicEmail(str_replace("[MEMBERID]", " - " . $user->id, $mailTemplate->subject), $finalTemplate));
                $user->renewal_reminder_mail_sent = 1;
                $user->renewal_reminder_mail_sent_date = Carbon::now();
                $user->save();
            }
        })->daily();
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
}
