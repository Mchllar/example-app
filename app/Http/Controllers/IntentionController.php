<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Models\Notice;
use App\Models\Journal;
use App\Mail\IntentionMail;
use App\Models\Conference;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class IntentionController extends Controller
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
    
        // Get the authenticated student's details
        $user = Auth::user();
        $studentName = $user->name;
    
        // Get the admin email address
        $adminEmail = User::where('role_id', 3)->value('email'); 
    
        // Create New Notice Entry
        $notice = Notice::create([
            'thesis_title' => $request->thesis_title,
            'proposed_date' => $request->proposed_date,
            'user_id' => $user->id,
        ]);
    
        // Send email notification to admin
        Mail::to($adminEmail)->send(new IntentionMail($studentName, $user->student->student_number));
    
        // Redirect back with a success message
        return redirect('/')->with('message', 'Intention to Submit Notice submitted successfully.');
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

    public function adminIndex()
    {
        $notices = Notice::all();

        return view('staff.intention_notices_records', compact('notices'));
    }
}
