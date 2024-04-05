<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;
use App\Models\Review;
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
        // Assigning attributes
        $review->file_upload = $file_path;
        $review->comments = $request->comments; 
        $review->user_id = $user_id;  // Assuming user_id is the foreign key here

        // Save the review
        $review->save();

        // Redirect with success message
        return redirect('/')->with('message', 'Conference Review Submitted Successfully.');
    } else {
        // Handle file upload failure
        return redirect('/')->with('message', 'Conference Review Submission Failed.');
    }
}

}