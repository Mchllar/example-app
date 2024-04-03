<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Http\Request; // Add this line


class ThesisApprovalReminder extends Mailable
{
    use Queueable, SerializesModels;
    
    public $studentName;
    /**
     * Create a new message instance.
     * @param string $studentName
     * @return void
     */
    public function __construct($studentName)
    {
        $this->studentName = $studentName;
    }

     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reminder');
    }
}
