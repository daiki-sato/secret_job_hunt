<?php

namespace App\Console\Commands;

use App\Mail\RemindMail;
use App\Models\Call;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendRemindMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email to both users to remind the day before the interview';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tomorrow = Carbon::tomorrow();
        $day_after_tomorrow = Carbon::today()->addDays(2);
        $remind_dates = Call::whereBetween('confirmed_interview_date', [$tomorrow, $day_after_tomorrow])->get();

        foreach ($remind_dates as $remind_date) {
            $from_what_time = $remind_date->confirmed_interview_date;
            $date = new DateTime($from_what_time);
            $to_what_time = date_format($date->modify('+10 minutes'), 'Y-m-d H:i:s');
            $user_id = Call::where('id', $remind_date->id)->value('user_id');
            $user_mail = User::where('id', $user_id)->value('email');
            $solver_id = Call::where('id', $remind_date->id)->value('solver_id');
            $solver_mail = User::where('id', $solver_id)->value('email');

            $emails = [
                $user_mail,
                $solver_mail,
            ];

            foreach ($emails as $email){
                Mail::to($email)->send(new RemindMail($from_what_time, $to_what_time));
            }
        }
    }
}