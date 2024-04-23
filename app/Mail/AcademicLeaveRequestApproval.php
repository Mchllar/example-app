<?php
namespace App\Mail;

use App\Models\LeaveApproval;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class academicLeaveApprovalNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $academicLeaveApproval;

    public function __construct(LeaveApproval $academicLeaveApproval)
    {
        $this->academicLeaveApproval = $academicLeaveApproval;
    }

    public function build(){

        return $this->markdown('emails.academic_leave_request_approval')
                    ->with([
                        'academicLeaveApproval' => $this->academicLeaveApproval,
                    ]);
    }
}
