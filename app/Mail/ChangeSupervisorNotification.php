<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\ChangeSupervisorRequest;

class ChangeSupervisorNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $changeSupervisorRequest;

    /**
     * Create a new message instance.
     *
     * @param  ChangeSupervisorRequest  $changeSupervisorRequest
     * @return void
     */
    public function __construct(ChangeSupervisorRequest $changeSupervisorRequest)
    {
        $this->changeSupervisorRequest = $changeSupervisorRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Change Supervisor Request')
                    ->view('emails.change_supervisor_notification');
    }
}
