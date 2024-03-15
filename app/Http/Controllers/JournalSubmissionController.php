<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use Illuminate\Support\Facades\Storage;



class JournalSubmissionController extends Controller
{
    public function journalSubmission()
    {
        return view('student.journal_submission');
    }

    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            'journal_title' => 'required', 
            'title_of_paper' => 'required',
            'status' => 'required',
            'file_upload' => 'required', 
        ]);
    
        // Ensure the directory exists
        Storage::makeDirectory('public/files');

        // Handle File Upload
        if ($request->hasFile('file_upload')) {
        $file = $request->file('file_upload');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/files', $fileName);
        } else {
            return redirect()->back()->with('error', 'File upload failed.'); // Handle file upload failure
        }

        // Create New Journal Entry
        Journal::create([
            'journal_title' => $request->journal_title,
            'title_of_paper' => $request->title_of_paper,
            'status' => $request->status,
            'file_upload' => $fileName, // Store the file path in the database
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Journal Publication submitted successfully.');
    }
}


 // 'approved_by_director_graduate_studies'=>'nullable|boolean',
 // 'approved_by_principal_supervisor'=>'nullable|boolean',