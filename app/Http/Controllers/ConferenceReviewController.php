<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



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

    // Handle File Upload
    if ($request->hasFile('file_upload')) {
        $file = $request->file('file_upload');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/files', $fileName);
        
        // Get the authenticated user_id
        $user_id = Auth::user()->student->user_id;

        // Create New Review Entry
        $review = new Review();
        // Assigning attributes
        $review->file_upload = $fileName;
        $review->comments = $request->comments; 
        $review->user_id = $user_id;  // Assuming user_id is the foreign key here

        // Save the review
        $review->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Conference Publication submitted successfully.');
    } else {
        // Handle file upload failure
        return redirect()->back()->with('error', 'File upload failed.');
    }
}

}