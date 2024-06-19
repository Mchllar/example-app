<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ConferenceReviewApproval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ConferenceReviewController extends Controller
{
    public function conferenceReview() {
        return view('student.conference_review');
    }

    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            'file_upload' => 'required', 
            'comments' => 'required',
        ]);

        // Ensure the directory exists
        Storage::makeDirectory('public/conference_reviews');

        // Handle File Upload
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $file_path = $file->getClientOriginalName();
            $file->move(public_path('conference_reviews'), $file_path);
            
            // Get the authenticated user_id
            $user_id = Auth::user()->id;

            // Create New Review Entry
            $review = new Review();
            $review->file_upload = $file_path;
            $review->comments = $request->comments; 
            $review->user_id = $user_id;  
            $review->save();

            // Redirect with success message
            return redirect('review/record')->with('message', 'Conference Review Submitted Successfully.');
        } else {
            // Handle file upload failure
            return redirect('/')->with('message', 'Conference Review Submission Failed.');
        }
    }

    // Retrieving Records
    public function index()
    {
        $reviews = Review::all();

        return view('staff.conference_review_records', compact('reviews'));
    }

    public function approve(Request $request)
    {
        // Validate the request
        $request->validate([
            'criteria_id' => 'required|exists:conference_reviews,id',
        ]);

        // Get the admin ID from the authenticated user
        $adminId = auth()->user()->id;

        // Retrieve the review ID from the submission ID
        $criteriaId = $request->input('criteria_id');

        // Create a new ReviewApproval instance
        $approval = new ConferenceReviewApproval();
        $approval->criteria_id = $criteriaId;
        $approval->admin_id = $adminId;
        $approval->save();

        
        // Return a success response
        return redirect('review/record')->with('message', 'Review approved successfully.');

    }

}