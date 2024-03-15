<?php

namespace App\Http\Controllers;
use App\Models\Notice;
use  Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IntentionSubmissionController extends Controller
{
    public function noticeSubmission() {
        return view('student.notice');
    }

    public function store(Request $request)
    {
        $request->validate([
            'thesis_title' => 'required',
            'proposed_date'=> 'required',
        ]);

                // Create New Journal Entry
        Notice::create([
            'thesis_title' => $request->thesis_title,
            'proposed_date' => $request->proposed_date,
            
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Intention to Submit Notice submitted successfully.');
    }
}