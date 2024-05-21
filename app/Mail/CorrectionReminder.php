<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request; 


class CorrectionReminder extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Thesis/Dissertation Correction Reminder')
                    ->view('emails.correction_reminder');
    }
}
