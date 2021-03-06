<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    private $link;

    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reset_password')
                ->with([
                    'link' => $this->link,
                ]);
       // return $this->subject('Mail From book selling software [powerd by THÚY] @2020_phu')->view('emails.reset_password');
        // return $this->from('phule9225@gmail.com')
        //         ->view('emails.reset_password');
    }
}