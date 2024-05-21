<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thesis;
use App\Models\ThesisApproval;
use App\Models\ThesesMinutes;
use App\Models\ThesesReports;
use App\Models\SupervisorAllocation;
use App\Models\Reminder;
use App\Models\User;
use App\Models\Student;
use App\Models\Staff;

use App\Mail\ThesisSubmitted;
use App\Mail\ThesisApprovalReminder;
use App\Mail\DefenseReport;

use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            'submission_type' => 'required',
            'thesis_document' => $request->submission_type == '1' ? 'required|file|mimes:pdf' : '',
            'correction_form' => $request->submission_type == '2' ? 'required|file|mimes:pdf' : 'nullable',
            'correction_summary' => $request->submission_type == '2' ? 'required|file|mimes:pdf' : 'nullable',
        ]);
    
        $user_id = Auth::user()->id;
        $submission_type = $validatedData['submission_type'];
    
        // Handle thesis document upload
        if ($request->hasFile('thesis_document')) {
            $thesis_document = $request->file('thesis_document');
            $thesis_document_path = $thesis_document->getClientOriginalName();
            $thesis_document->move(public_path('thesis_documents'), $thesis_document_path);
        } else {
            return redirect('thesis.index')->with('failmessage', 'Thesis document is required. Please try again.');
        }
    
        // Create or update thesis record
        $thesis = Thesis::updateOrCreate(
            ['user_id' => $user_id, 'submission_type' => $submission_type],
            ['thesis_document' => $thesis_document_path]
        );
    
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
    
        // Save the Thesis instance to the database
        $thesis->save();
    
        return redirect('thesis.index')->with('message', 'Thesis successfully submitted!');
    }
    

    public function index()
    {   
        // Retrieve the currently authenticated user
        $user = Auth::user();

        if ($user->role_id == 2) {
            // Retrieve supervisees' theses if the user is a supervisor
            $superviseeUserIds = SupervisorAllocation::where('supervisor_id', $user->id)
                ->join('students', 'supervisor_allocations.student_id', '=', 'students.id')
                ->pluck('students.user_id')
                ->toArray();

            $thesis = Thesis::with('report', 'minutes', 'reminder') // Load reminder relationship
                ->whereIn('user_id', $superviseeUserIds)
                ->get();
        } else {
            // Retrieve theses submitted by the authenticated user (student)
            $thesis = Thesis::with('report', 'minutes', 'reminder') // Load reminder relationship
                ->where('user_id', $user->id)
                ->get();
        }

        return view('student.thesis_records', compact('thesis'));
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
}
 
    