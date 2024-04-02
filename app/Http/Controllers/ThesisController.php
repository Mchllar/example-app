<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thesis;
use App\Models\ThesisApproval;
use App\Models\SupervisorAllocation;
use App\Models\User;
use App\Models\Student;
use App\Mail\ThesisApprovalReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class ThesisController extends Controller
{
    // View for submitting thesis
    public function thesisSubmission() {
        return view('student.thesis_submission');
    }

    // Saving thesis to database
    public function store(Request $request)
    {
    $request->validate([
        'submission_type' => 'required',
        'thesis_document' => 'required|file|mimes:pdf',
        'correction_form' => 'nullable|file|mimes:pdf',
        'correction_summary' => 'nullable|file|mimes:pdf',
    ]);

    $user_id = Auth::user()->id;

    // Create a new Thesis instance
    $thesis = new Thesis();
    $thesis->user_id = $user_id;
    $thesis->submission_type = $request->submission_type;

    // Handle thesis document upload
    if ($request->hasFile('thesis_document')) {
        $thesis_document = $request->file('thesis_document');
        $thesis_document_path = time() . '_' . $thesis_document->getClientOriginalName();
        $thesis_document->storeAs('thesis_documents', $thesis_document_path);
        $thesis->thesis_document = $thesis_document_path;
    }

    // Handle correction form upload
    if ($request->hasFile('correction_form')) {
        $correction_form = $request->file('correction_form');
        $correction_form_path = time() . '_' . $correction_form->getClientOriginalName();
        $correction_form->storeAs('correction_forms', $correction_form_path);
        $thesis->correction_form = $correction_form_path;
    }

    // Handle correction summary upload
    if ($request->hasFile('correction_summary')) {
        $correction_summary = $request->file('correction_summary');
        $correction_summary_path =  time() . '_' . $correction_summary->getClientOriginalName();
        $correction_summary->storeAs('correction_summaries', $correction_summary_path);
        $thesis->correction_summary = $correction_summary_path;
    }


    // Save the Thesis instance to the database
    $thesis->save();

    return redirect()->back()->with('success', 'Thesis submitted successfully!');
    }

    // View of the Thesis submission
    public function index()
    {
    // Retrieve the currently authenticated user
    $user = auth()->user();
    
    // Check if the user's role is supervisor
    if ($user->role_id == 2) {
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

 
    // Changing the uploaded thesis document
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'thesis_document' => 'required|file|mimes:pdf',
        ]);

        // Retrieve the thesis record to update
        $thesis = Thesis::findOrFail($id);

        // Get the user ID
        $user_id = Auth::user()->id;

        // Ensure the authenticated user owns the thesis record
        if ($thesis->user_id != $user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Handle the file upload
        if ($request->hasFile('thesis_document')) {
            // Get the new file
            $newFile = $request->file('thesis_document');
            // Generate a unique file name
            $newFileName = time() . '_' . $newFile->getClientOriginalName();
            // Store the new file
            $newFile->storeAs('public/files', $newFileName);
            // Update the thesis document path
            $thesis->thesis_document = $newFileName;
            // Save the updated thesis record
            $thesis->save();
            // Return a success response with reload flag
            return response()->json(['message' => 'Thesis document updated successfully', 'reload' => true], 200);
        } else {
            // Return an error response if no file is provided
            return response()->json(['error' => 'No file provided'], 400);
        }
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
        return response()->json(['message' => 'Thesis approved successfully'], 200);
    } 

    public function sendReminder(Request $request) {
       try {
            // Retrieve supervisor's emails from the request
            $emails = $request->input('emails');
            
            // Get student name from authenticated user
            $user = Auth::user();
            $studentName = $user->name;
    
            // Initialize reminder message
           /* $reminder = [
                'action' => 'Please review',
                'task' => 'thesis submission',
                'name' => $studentName,
                'url' => 'http://127.0.0.1:8000/thesis.approval',
            ];*/
          
    
            // Send reminder emails to each recipient
            foreach ($emails as $email) {
                Mail::to($email)->send(new ThesisApprovalReminder($studentName));    
            }

            // If no exceptions are thrown, return success response
           return 'Reminder emails sent successfully';
        } catch (\Exception $e) {
            // Output the error message to the console or log it
            dump('Failed to send reminder emails: ' . $e->getMessage());
    
            // Return error response
            return response()->json(['error' => 'Failed to send reminder emails. Please try again later.'], 500);
        }
    }

    public function Reminder(){
        return view ('emails.reminder');
    }
    
}   
    






