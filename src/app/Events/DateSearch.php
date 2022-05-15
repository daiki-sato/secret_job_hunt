<?php

namespace App\Events;

use App\Mail\RemindMail;
use App\Models\Interview;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class DateSearch
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Interview $interview)
    {
        $user_mail = User::where('id', $interview->user_id)->value('email');
        $solver_mail = User::where('id', $interview->solver_id)->value('email');
        Mail::to($user_mail, $solver_mail)->send(new RemindMail());

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