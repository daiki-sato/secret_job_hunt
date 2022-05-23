<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Acceptance extends Mailable
{
    use Queueable, SerializesModels;

    protected $solver_name;
    protected $from_what_time;
    protected $to_what_time;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($solver_name, $from_what_time, $to_what_time)
    {
        $this->solver_name = $solver_name;
        $this->from_what_time = $from_what_time;
        $this->to_what_time = $to_what_time;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('面談依頼が承諾されました！')
            ->from('mailhog@sample.com')
            ->text('emails.acceptance')
            ->with([
                'solver_name' => $this->solver_name,
                'from_what_time' => $this->from_what_time,
                'to_what_time' => $this->to_what_time,
            ]);
    }
}