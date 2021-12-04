<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailApproval extends Mailable
{
    use Queueable, SerializesModels;

    /**mai
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.approval')
            ->subject('Your Appoint is Approved')
            ->attach(public_path('/img/logo.jpg'), [
                'as' => 'nameTongImg'
            ]);
    }
}
