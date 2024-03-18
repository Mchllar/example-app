<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;
use App\Models\Review;

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
        } else {
            return redirect()->back()->with('error', 'File upload failed.'); // Handle file upload failure
        }

        // Create New Review Entry
        Review::create([
            'file_upload' => $fileName, // Store the file path in the database
            'comments' => $request->comments,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Conference Review submitted successfully.');
    }
}