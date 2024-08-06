<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use App\Models\User;
use App\Models\Defense;
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
    
    //Defense Records
    public function defenseRecords(Request $request)
    {
        /* Retrieve the currently authenticated user
        $user = auth()->user();

        if ($user->role_id == 3) {
        $defense = Defense::with('student') 
                        ->orderBy('created_at', 'desc')
                        ->get();

        } elseif ($user->role_id == 1) {
            // User is a student (role ID 1): Retrieve records specific to the student
            $defense= Defense::where('user_id', $user->id)->get();

        } elseif ($user->role_id == 2) {
            // User is a student (role ID 1): Retrieve records of the supervisees
            $defense= Defense::where('user_id', $user->id)->get();

            // Retrieve supervisees' theses if the user is a supervisor
            $superviseeUserIds = SupervisorAllocation::where('supervisor_id', $user->id)
            ->join('students', 'supervisor_allocations.student_id', '=', 'students.id')
            ->pluck('students.user_id')
            ->toArray();

            /*$thesis = Thesis::with('report', 'minutes', 'reminder') // Load reminder relationship
                ->whereIn('user_id', $superviseeUserIds)
                ->get();
            $defense = Defense::with('student') 
                    ->orderBy('created_at', 'desc')
                    ->get();
        }
        else {
            // Handle other roles as needed (optional)
            $journals = collect(); // Default to an empty collection if role is unknown
        }*/

        return view('staff.defense', compact('defense'));

    }
        

}  


