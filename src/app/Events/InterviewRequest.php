<?php

namespace App\Events;

use App\Models\Interview;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\InterviewRequestMail;
use App\Models\InterviewTime;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class InterviewRequest
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Interview $interview)
    {
        $solver_id = $interview->solver_id;
        $solver_email = User::where('id', $solver_id)->value('email');
        $user = User::where('id', $interview->user_id)->value('nickname');
        Mail::to($solver_email)->send(new InterviewRequestMail($interview, $user));
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
