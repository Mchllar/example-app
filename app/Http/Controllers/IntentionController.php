<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Models\Notice;
use App\Models\Journal;
use App\Models\JournalApproval;
use App\Models\ConferenceApproval;
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
        return redirect('notice.record')->with('message', 'Intention to Submit Notice submitted successfully.');
    }

    // Retrieving Records
    public function index()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();

        // Determine which journals to retrieve based on user's role
        if ($user->role_id == 3) {
            // User is an admin (role ID 3): Retrieve all journals
            $notices = Notice::all();
        } elseif ($user->role_id == 1) {
            // User is a student (role ID 1): Retrieve journals submitted by the student
            $journals = Journal::where('user_id', $user->id)->get();

            // Retrieve conferences submitted by the authenticated user
            $conferences = Conference::where('user_id', Auth::id())->get();

        } else {
            // Handle other roles as needed (optional)
            $journals = collect(); // Default to an empty collection if role is unknown
        }

        return view('student.notice', compact('journals', 'conferences'));
    }

    public function adminIndex()
    {
        $notices = Notice::all();

        return view('staff.intention_notices_records', compact('notices'));
    }
}
