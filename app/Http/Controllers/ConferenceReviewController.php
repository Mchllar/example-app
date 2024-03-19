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
        

        // Get the authenticated student's student_number
        $studentNumber = Auth::user()->student->student_number;

        // Retrieve the corresponding student id based on student_number
        $studentId = DB::table('students')->where('student_number', $studentNumber)->value('id');

        // Create New Review Entry
        $review= new Review();
        $review->file_upload = $fileName; // Use student_id as foreign key reference
        $review->comments = $request->comments; 
        $review->student_number = $studentId;       
        
        return redirect()->back()->with('success', 'Conference Publication submitted successfully.');
        } else {
        return redirect()->back()->with('error', 'File upload failed.'); // Handle file upload failure
        }
    }
}