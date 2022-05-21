<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemindMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from_what_time, $to_what_time)
    {
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
        return $this->subject('リマインドメールです。')
            ->from('mailhog@sample.com')
            ->text('emails.remind')
            ->with([
                'from_what_time' => $this->from_what_time,
                'to_what_time' => $this->to_what_time,
            ]);
    }
}