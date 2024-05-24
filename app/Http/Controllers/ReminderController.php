<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Reminder;
use App\Models\Thesis;
use App\Models\ThesisApproval;
use App\Models\SupervisorAllocation;

use App\Mail\ThesisApprovalReminder;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;


class ReminderController extends Controller
{
    public function reminder(Request $request)
    {
        // Validate the request
        $request->validate([
            'submission_id' => 'required|exists:theses,id',
        ]);

        $submissionId = $request->input('submission_id');
        $emails = $request->input('emails');

                  //Get student name from authenticated user
                  $user = Auth::user();
                  $studentName = $user->name;
              

        // Send reminder emails to each recipient
        foreach ($emails as $email) {
            Mail::to($email)->send(new ThesisApprovalReminder($studentName)); 
        }
        
        // Update or create a reminder record
        $user_id = auth()->user()->id;
        $reminder = Reminder::updateOrCreate(
            ['user_id' => $user_id, 'submission_id' => $submissionId],
        );

        // Return success response
        return response()->json([
            'message' => 'Reminders sent successfully',
            'reminder' => $reminder 
        ]);
    }
}



    
    

