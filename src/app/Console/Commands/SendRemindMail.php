<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\RemindMail;
use App\Models\Interview;
use App\Models\User;
use App\Models\InterviewTime;
use Carbon\Carbon;

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
        $remind_dates = InterviewTime::wheredate('from_what_time', $tomorrow)
            ->where('is_agreement', 1)
            ->get();

        // dd($remind_dates);

        foreach ($remind_dates as $remind_date) {
            $user_id = Interview::where('id',$remind_date->interview_id)->value('user_id');
            $user_mail = User::where('id', $user_id)->value('email');
            $solver_id = Interview::where('id',$remind_date->interview_id)->value('solver_id');
            $solver_mail = User::where('id', $solver_id)->value('email');
            return Mail::to($user_mail, $solver_mail)->send(new RemindMail());
        }
    }
}
