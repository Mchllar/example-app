<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thesis;
use App\Models\SupervisorAllocation;
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
        $thesis_document_path = 'public/files/' . time() . '_' . $thesis_document->getClientOriginalName();
        $thesis_document->storeAs('public/files', $thesis_document_path);
        $thesis->thesis_document = $thesis_document_path;
    }

    // Handle correction form upload
    if ($request->hasFile('correction_form')) {
        $correction_form = $request->file('correction_form');
        $correction_form_path = 'public/files/' . time() . '_' . $correction_form->getClientOriginalName();
        $correction_form->storeAs('public/files', $correction_form_path);
        $thesis->correction_form = $correction_form_path;
    }

    // Handle correction summary upload
    if ($request->hasFile('correction_summary')) {
        $correction_summary = $request->file('correction_summary');
        $correction_summary_path = 'public/files/' . time() . '_' . $correction_summary->getClientOriginalName();
        $correction_summary->storeAs('public/files', $correction_summary_path);
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
           $thesis->thesis_document = 'public/files/' . $newFileName;
           // Save the updated thesis record
           $thesis->save();
           // Return a success response with reload flag
           return response()->json(['message' => 'Thesis document updated successfully', 'reload' => true], 200);
       } else {
           // Return an error response if no file is provided
           return response()->json(['error' => 'No file provided'], 400);
       }
    }



 
   
   
}




