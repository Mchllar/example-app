<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Journal;
use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntentionSubmissionController extends Controller
{
    public function noticeSubmission()
    {
        return $this->index();
    }

    public function store(Request $request)
    {
        $request->validate([
            'thesis_title' => 'required',
            'proposed_date' => 'required',
        ]);

        // Get the authenticated student's student_number
        $user_id = Auth::user()->student->user_id;
        
        // Create New Notice Entry
        Notice::create([
            'thesis_title' => $request->thesis_title,
            'proposed_date' => $request->proposed_date,
            'user_id' => $user_id,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Intention to Submit Notice submitted successfully.');
    }

    // Retrieving Records
    public function index()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();

        // Retrieve journals submitted by the authenticated user
        $journals = Journal::where('user_id', Auth::id())->get();

        // Retrieve conferences submitted by the authenticated user
        $conferences = Conference::where('user_id', Auth::id())->get();

      

        return view('student.notice', compact('journals', 'conferences'));
    }
}
