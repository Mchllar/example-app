<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function conferenceSubmission() {
        return view('student.conference_submission');
    }

    public function store(Request $request) {
        // Form Validation
        $request->validate([
            'conference_title' => 'required', 
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
        
                // Create New Conference Entry
                Conference::create([
                    'conference_title' => $request->conference_title,
                    'title_of_paper' => $request->title_of_paper,
                    'status' => $request->status,
                    'file_upload' => $fileName, // Store the file path in the database
                ]);
        
                // Redirect back with a success message
                return redirect()->back()->with('success', 'Conference Publication submitted successfully.');
    }

        //Retrieving Records
        public function records()
        {
            $studentId = Auth::user()->student_id;

            $conference = Conference::where('student_id', $studentId)->get();
            
           return view('notice', compact('conference'));
        }
}
