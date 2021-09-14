<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserUpdatedEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $email = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@bric.solutions', 'MGO')
            ->subject("User ({$this->email}) has been updated his info")
            ->view('emails.updated_user');
    }
}
