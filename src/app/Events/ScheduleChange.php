<?php

namespace App\Events;

use App\Mail\RescheduleRequestMail;
use App\Models\Interview;
use App\Models\InterviewTime;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ScheduleChange
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(InterviewTime $interview_time)
    {
        $new_interview_id = $interview_time->interview_id;
        $user_id = Interview::where('id', $new_interview_id)->value('user_id');
        $solver_id = Interview::where('id', $new_interview_id)->value('solver_id');
        $solver_email = User::where('id', $solver_id)->value('email');
        $user_email = User::where('id', $user_id)->value('email');
        Mail::to($user_email, $solver_email)->send(new RescheduleRequestMail());
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