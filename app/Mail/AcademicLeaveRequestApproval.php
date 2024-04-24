<?php
namespace App\Mail;

use App\Models\AcademicLeaveRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AcademicLeaveRequestApproval extends Mailable
{
    use Queueable, SerializesModels;

    public $academicLeaveRequest;

    public function __construct(AcademicLeaveRequest $academicLeaveRequest)
    {
        $this->academicLeaveRequest = $academicLeaveRequest;
    }

    public function build()
    {
        return $this->markdown('emails.academic_leave_request_approval')
                    ->with([
                        'academicLeaveRequest' => $this->academicLeaveRequest,
                    ]);
    }
}
