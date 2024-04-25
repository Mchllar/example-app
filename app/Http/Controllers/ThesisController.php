<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thesis;
use App\Models\ThesisApproval;
use App\Models\SupervisorAllocation;
use App\Models\User;
use App\Models\Student;
use App\Models\Staff;
use App\Mail\ThesisSubmitted;
use App\Mail\ThesisApprovalReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ThesisController extends Controller
{
    // View for submitting thesis
    public function thesisSubmission() {
        return view('student.thesis_submission');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'submission_type' => 'required',
            'thesis_document' => 'required|file|mimes:pdf',
            'correction_form' => 'nullable|file|mimes:pdf',
            'correction_summary' => 'nullable|file|mimes:pdf',
        ]);

        session(['user_id' => $validatedData['user_id']]);
        session(['submission_type' => $validatedData['submission_type']]);

        $validatedData = array_merge($validatedData,[
            'examination_report'=> '',
            'minutes'=> '',
        ]);
    
        $user_id = Auth::user()->id;
        $submission_type = $validatedData['submission_type'];
    
        // Check if there's an existing thesis entry for the current user and submission type
        $existingThesis = Thesis::where('user_id', $user_id)
                                 ->where('submission_type', $submission_type)
                                 ->first();
    
        // If an existing entry is found, update it; otherwise, create a new instance
        if ($existingThesis) {

            $isApproved = ThesisApproval::where('submission_id', $existingThesis->id)
                                            ->exists();

            if($isApproved){
                return redirect('thesisSubmission')->with('failmessage', 'You cannot replace an approved Thesis document!');

            }
            
            $thesis = $existingThesis;
        } else {
            $thesis = new Thesis();
            $thesis->user_id = $user_id;
            $thesis->submission_type = $submission_type;
        }
    
        // Handle thesis document upload
        if ($request->hasFile('thesis_document')) {
            $thesis_document = $request->file('thesis_document');
            $thesis_document_path = $thesis_document->getClientOriginalName();
            $thesis_document->move(public_path('thesis_documents'), $thesis_document_path);
            $thesis->thesis_document = $thesis_document_path;
        }
    
        // Handle correction form upload
        if ($request->hasFile('correction_form')) {
            $correction_form = $request->file('correction_form');
            $correction_form_path = $correction_form->getClientOriginalName();
            $correction_form->move(public_path('correction_forms'), $correction_form_path);
            $thesis->correction_form = $correction_form_path;
        }
    
        // Handle correction summary upload
        if ($request->hasFile('correction_summary')) {
            $correction_summary = $request->file('correction_summary');
            $correction_summary_path = $correction_summary->getClientOriginalName();
            $correction_summary->move(public_path('correction_summaries'), $correction_summary_path);
            $thesis->correction_summary = $correction_summary_path;
        }

        //Email Notification to Supervisor
        $user = Auth::user();
        $studentName = $user->name;
        $studentNumber = $user->student->student_number;
        $studentId = $user->student->id; // Get the student ID


        // Retrieve the student record based on the authenticated user's ID
        $student = Student::where('user_id', $user->id)->first();

        if (!$student) {
            // Handle case where student record is not found for the authenticated user
            return redirect()->back()->with('error', 'Student record not found.');
        }

        // Retrieve assigned supervisors for the current student
        $supervisorIds = SupervisorAllocation::where('student_id', $studentId)
                            ->pluck('supervisor_id') 
                            ->toArray(); 

        // Fetch supervisor emails from the users table based on supervisor IDs
        $supervisorEmails = User::whereIn('id', $supervisorIds)
                                ->pluck('email')
                                ->toArray(); 

        // Send email to each supervisor
        foreach ($supervisorEmails as $supervisorEmail) {
            if ($supervisorEmail) {
                // Send email to supervisor
                Mail::to($supervisorEmail)->send(new ThesisSubmitted($studentName, $studentNumber));
            }
        }


        // Save the Thesis instance to the database
        $thesis->save();

        /*$thesis = Thesis::updateOrCreate(
            [
                'user_id' => $request['user_id'],
                'submission_type' => $request['submission_type'],

            ],
            $validatedData
        );*/
    
        return redirect('thesis.index')->with('message', 'Thesis submitted successfully and an email has been sent to your supervisors.');
    }

    public function admin($user_id, $submission_type)
    {
        $thesis = Thesis::where('user_id', $user_id)
                        ->where('submission_type', $submission_type)
                        ->first();

        return view('student.thesis_admin', compact('thesis', 'user_id', 'submission_type'));
    }

    public function adminStore(Request $request){

        $validatedData = $request -> validate([
            'user_id' => 'nullable|exists:users,id',
            'examination_report'=> 'nullable|string',
            'minutes'=> 'nullable|string',
        ]);

        // Retrieve session data
        $user_id = session('user_id');
        $submission_type = session('submission_type');

        $thesis = Thesis::where('user_id', $user_id)
                        ->where('submission_type', $submission_type)
                        ->first();

        if($thesis){

            // Handle examination reports upload
            if ($request->hasFile('examination_report')) {
                $examination_report = $request->file('examination_report');
                $examination_report_path = $examination_report->getClientOriginalName();
                $examination_report->move(public_path('examination_reports'), $examination_report_path);
                $thesis->examination_report = $examination_report_path;
            }

            // Handle minutes upload
            if ($request->hasFile('minutes')) {
                $minutes = $request->file('minutes');
                $minutes_path = $minutes->getClientOriginalName();
                $minutes->move(public_path('minutes'), $minutes_path);
                $thesis->minutes = $minutes_path;
            }

            $thesis->save();
            //$thesis ->update($validatedData);

            $student = User::find($user_id);

            if ($student){

                $adminName = Auth::user()->name;
                $emailContent = "Greetings, the minutes and examination reports have been uploaded by $adminName.";
                Mail::to($student->email)->send(new DefenseReport($emailContent));
            }

            return redirect()->with('message', 'Examination report and minutes uploaded successfully.');
        }  

        return redirect()->with('failmessage', 'Thesis not found for the specified user and submission type.');
    }
    

    // View of the Thesis submission
    public function index()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();

        // Check if the user's role is admin (role_id = 3 for admin)
        if ($user->role_id == 3) {
            // Retrieve all thesis records from the database
            $thesis = Thesis::all();
        } elseif ($user->role_id == 2) {
            // Retrieve supervisees' theses if the user is a supervisor
            $superviseeUserIds = SupervisorAllocation::where('supervisor_id', $user->id)
                ->join('students', 'supervisor_allocations.student_id', '=', 'students.id')
                ->pluck('students.user_id')
                ->toArray();
            
            $thesis = Thesis::whereIn('user_id', $superviseeUserIds)->get();
        } else {
            // Retrieve theses submitted by the authenticated user (student)
            $thesis = Thesis::where('user_id', $user->id)->get();
        }
        
        return view('student.thesis_records', compact('thesis'));
    }

    //Admin view of the Thesis submission
    public function adminIndex($user_id, $submission_type)
    {
        $thesis = Thesis::where('user_id', $user_id)
                        ->where('submission_type', $submission_type)
                        ->first();

        $thesis = Thesis::all();
            
        return view('student.thesis_admin', compact('thesis', 'user_id', 'submission_type'));  
    }
    
        
    public function approveThesis(Request $request)
    {
        // Validate the request
        $request->validate([
            'submission_id' => 'required|exists:theses,id',
        ]);

        // Get the supervisor ID from the authenticated user
        $supervisorId = auth()->user()->id;

        // Retrieve the thesis ID from the submission ID
        $thesisId = $request->input('submission_id');

        // Create a new ThesisApproval instance
        $approval = new ThesisApproval();
        $approval->submission_id = $thesisId;
        $approval->supervisor_id = $supervisorId;
        $approval->save();

        // Return a success response
        return redirect('thesis.index')->with('message', 'Thesis approved successfully.');
    } 

    public function sendReminder(Request $request) {
       try {
            // Retrieve supervisor's emails from the request
            $emails = $request->input('emails');
            
            //Get student name from authenticated user
            $user = Auth::user();
            $studentName = $user->name;
           
    
            // Send reminder emails to each recipient
            foreach ($emails as $email) {
                Mail::to($email)->send(new ThesisApprovalReminder($studentName));    
            }

            $sentDate = Carbon::now()->toDateString(); // Get current date (YYYY-MM-DD format)

            // If no exceptions are thrown, return success response
            return response()->json(['message' => 'Reminder emails sent successfully', 'sent_date' => $sentDate]);
        } catch (\Exception $e) {
            // Output the error message to the console or log it
            dump('Failed to send reminder emails: ' . $e->getMessage());
    
            // Return error response
            return response()->json(['error' => 'Failed to send reminder emails. Please try again later.'], 500);
        }
    }
}   
    






