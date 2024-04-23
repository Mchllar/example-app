<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $password;
    public $resetLink;

    public function __construct($password, $resetLink)
    {
        $this->password = $password;
        $this->resetLink = $resetLink;
    }

    public function build()
    {
        return $this->markdown('emails.registered');
    }
}
