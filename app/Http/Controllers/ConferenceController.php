<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Conference;
use App\Models\ConferenceApproval;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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
            Storage::makeDirectory('public/conference_publications');

            // Handle File Upload
            if ($request->hasFile('file_upload')) {
                $file = $request->file('file_upload');
                $file_path = $file->getClientOriginalName();
                $file->move(public_path('conference_publications'), $file_path);
                           
                // Get the authenticated student's student_number
                $user_id = Auth::user()->id;

                // Create New Conference Entry
                $conference = new Conference();
                $conference->user_id = $user_id; 
                $conference->conference_title = $request->conference_title;
                $conference->title_of_paper = $request->title_of_paper;
                $conference->status = $request->status;
                $conference->file_upload = $file_path; 
                $conference->save();
        
                // Redirect back with a success message
                return redirect('conference.index')->with('message', 'Conference Publication submitted successfully.');
            } else {
                return redirect('conference.index')->with('failMessage', 'Conference Publication upload Failed.'); 
            }

            
        }

        // Retrieving Records

        public function index()
        {
            // Retrieve the currently authenticated user
            $user = auth()->user();
        
            // Determine which conference to retrieve based on user's role
            if ($user->role_id == 3) {
                // User is an admin (role ID 3): Retrieve all conference
                $conferences = Conference::with('student') 
                                ->orderBy('created_at', 'desc')
                                ->get();
            } elseif ($user->role_id == 1) {
                // User is a student (role ID 1): Retrieve journals submitted by the student
                $conferences = Conference::where('user_id', $user->id)->get();
            } else {
                // Handle other roles as needed (optional)
                $conferences = collect(); // Default to an empty collection if role is unknown
            }
        
            return view('student.conference_records', compact('conferences'));
        }

        public function approveConference(Request $request)
        {
            // Validate the request
            $request->validate([
                'submission_id' => 'required|exists:conferences,id',
            ]);

            // Get the admin ID from the authenticated user
            $adminId = auth()->user()->id;

            // Retrieve the conference ID from the submission ID
            $conferenceId = $request->input('submission_id');

            // Create a new ConferenceApproval instance
            $approval = new ConferenceApproval();
            $approval->submission_id = $conferenceId;
            $approval->admin_id = $adminId;
            $approval->save();

            // Flash success message and variables to the next request
            return redirect()->route('conference.index')->with('message', 'Conference approved successfully.');
                            
        }
}
