<?php

namespace App\Events;

use App\Mail\Acceptance as MailAcceptance;
use App\Models\Interview;
use App\Models\InterviewTime;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class Acceptance
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(InterviewTime $interview_time)
    {
        if ($interview_time->is_agreement == 1) {
            $interview_id = $interview_time->interview_id;
            $user_id = Interview::where('id', $interview_id)->value('user_id');
            $solver_id = Interview::where('id', $interview_id)->value('solver_id');
            $solver_name = User::where('id', $solver_id)->value('nickname');
            $user_mail = User::where('id', $user_id)->value('email');
            $from_what_time = $interview_time->from_what_time;
            $to_what_time = $interview_time->to_what_time;
            Mail::to($user_mail)->send(new MailAcceptance($solver_name, $from_what_time, $to_what_time));
        } else {
            return false;
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}