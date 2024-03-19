<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Conference;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                
                // Get the authenticated student's student_number
                $user_id = Auth::user()->student->user_id;

                // Create New Conference Entry
                $conference = new Conference();
                $conference->user_id = $user_id; // Use student_id as foreign key reference
                $conference->conference_title = $request->conference_title;
                $conference->title_of_paper = $request->title_of_paper;
                $conference->status = $request->status;
                $conference->file_upload = $fileName; // Store the file path in the database
                $conference->save();
        
                // Redirect back with a success message
                return redirect()->back()->with('success', 'Conference Publication submitted successfully.');
            } else {
                return redirect()->back()->with('error', 'File upload failed.'); // Handle file upload failure
            }
        }
     
      

        // Retrieving Records
        public function index()
        {
            // Retrieve the currently authenticated user
            $user = auth()->user();

            // Retrieve conferences submitted by the authenticated user
            $conferences = Conference::where('user_id', auth()->id())->get();
            
            return view('student.conference_records', compact('conferences'));
        }

    }
