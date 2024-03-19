<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thesis;
use Illuminate\Support\Facades\Auth;


class ThesisController extends Controller
{
    public function thesisSubmission() {
        return view('student.thesis_submission');
    }

    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            'journal_title' => 'required', 
            'title_of_paper' => 'required',
            'submission_type' => 'required',
            'thesis_document' => 'required', 
        ]);
    
        // Ensure the directory exists
        Storage::makeDirectory('public/files');

        // Handle File Upload
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/files', $fileName);

            // Get the authenticated student's student_number
            $user_id = Auth::user()->student->user_id;

            // Create New Journal Entry
            $journal = new Journal();
            $journal->user_id = $user_id; // Use student_id as foreign key reference
            $journal->journal_title = $request->journal_title;
            $journal->title_of_paper = $request->title_of_paper;
            $journal->status = $request->status;
            $journal->file_upload = $fileName; // Store the file path in the database
            $journal->save();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Journal Publication submitted successfully.');
        } else {
            return redirect()->back()->with('error', 'File upload failed.'); // Handle file upload failure
        }
    }

    public function index()
    {
        return view('student.thesis_records');
        // Retrieve the currently authenticated user
        //$user = auth()->user();
    
        // Retrieve conferences submitted by the authenticated user
       // $thesis = Thesis::where('user_id', auth()->id())->get();
                
       // return view('student.thesis_index', compact('thesis'));
    }
}
