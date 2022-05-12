<?php

namespace App\Mail;

use App\Models\Interview;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Symfony\Component\HttpKernel\Fragment\HIncludeFragmentRenderer;

class InterviewRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $interview;
    protected $user;

    public function __construct(Interview $interview, $user)
    {
        $this->interview = $interview;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->subject('面談依頼が届きました。')
            ->from('mailhog@sample.com')
            ->text('emails.interview_request')
            ->with([
                'interview' => $this->interview,
                'user' => $this->user,
            ]);
    }
}
