<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use App\Models\User;
use App\Models\ThesesReports;
use App\Models\ThesesMinutes;
use App\Models\SupervisorAllocation;
use App\Models\CorrectionReminder;
use App\Mail\CorrectionReminder as CorrectionReminderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;


class AdminController extends Controller
{
    public function admin() {

        $thesis = Thesis::with('student') 
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('staff.thesis_admin', compact('thesis'));
    }

    public function submitReports(Request $request, Thesis $thesis)
    {
        $request->validate([
            'report' => 'required|file|mimes:pdf',
        ]);

        if ($request->hasFile('report')) {
            $reportFile = $request->file('report');
            $reportPath = $reportFile->getClientOriginalName();
            
            $reportFile->move(public_path('examination_reports'), $reportPath);

            ThesesReports::updateOrCreate(
                ['submission_id' => $thesis->id],
                ['report' => $reportPath]
            );

            return redirect()->route('thesis.admin')->with('message', 'Report submitted successfully.');
        } 
        else {
            return redirect()->route('thesis.admin')->with('failMessage', 'Submission Failed.');

        }

    }

    public function submitMinutes(Request $request, Thesis $thesis)
    {
        // Validate the incoming request
        $request->validate([
            'minutes' => 'required|file|mimes:pdf',
        ]);

        if ($request->hasFile('minutes')) {
            $minutesFile = $request->file('minutes');
            $minutesPath = $minutesFile->getClientOriginalName();
            
            $minutesFile->move(public_path('minutes'), $minutesPath);

            ThesesMinutes::updateOrCreate(
                ['submission_id' => $thesis->id],
                ['minutes' => $minutesPath]
            );

            return redirect()->route('thesis.admin')->with('message', 'Minutes submitted successfully.');
        } else {
            return redirect()->route('thesis.admin')->with('error', 'No file uploaded.');
        }

    }

    public function correctionReminder(Request $request){

        $thesis = Thesis::where('submission_type', '2')
                        ->get();

        return view('staff.correction_reminders', compact('thesis'));
    }

    public function studentReminder(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
            'scheduled_date_time' => 'nullable|date'
        ]);
    
        $userIds = $request->input('user_ids');
        $scheduledDateTime = $request->input('scheduled_date_time') ? Carbon::parse($request->input('scheduled_date_time')) : null;
    
        // Retrieve email addresses of the selected users (students)
        $emails = Thesis::whereIn('user_id', $userIds)
                        ->join('users', 'theses.user_id', '=', 'users.id')
                        ->distinct()
                        ->pluck('users.email')
                        ->toArray();
                        Log::info('Emails retrieved', ['emails' => $emails]);

        // Send or schedule reminder emails
        foreach ($emails as $email) {
            if ($scheduledDateTime) {
                Mail::to($email)->later($scheduledDateTime, new CorrectionReminderMail());
            } else {
                Mail::to($email)->send(new CorrectionReminderMail());
            }
        }
    
        // Update or create records to track reminders sent
        foreach ($userIds as $userId) {
            CorrectionReminder::updateOrCreate(
                ['user_id' => $userId],
                ['sent_at' => $scheduledDateTime ? null : now(), 'scheduled_at' => $scheduledDateTime]
            );
        }
    
        // Return success response
        return response()->json(['message' => $scheduledDateTime ? 'Reminders scheduled successfully' : 'Reminders sent successfully']);
    }
    
        

}  


