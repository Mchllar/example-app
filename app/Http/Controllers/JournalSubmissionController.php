<?php

namespace App\Http\Controllers; 

use Illuminate\Support\Facades\DB;
use App\Models\Journal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class JournalSubmissionController extends Controller
{
    public function journalSubmission()
    {
        return view('student.journal_submission');
    }
    
    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            'journal_title' => 'required', 
            'title_of_paper' => 'required',
            'status' => 'required',
            'file_upload' => 'required', 
        ]);
    
        // Ensure the directory exists
        Storage::makeDirectory('public/journal_publications');
    
        // Handle File Upload
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $file_path = $file->getClientOriginalName();
            $file->move(public_path('journal_publications'), $file_path);
    
            // Get the authenticated user's ID
            $user_id = Auth::user()->id;
    
            // Create New Journal Entry
            $journal = new Journal();
            $journal->user_id = $user_id; 
            $journal->journal_title = $request->journal_title;
            $journal->title_of_paper = $request->title_of_paper;
            $journal->status = $request->status;
            $journal->file_upload = $file_path; 
            $journal->save();
    
            // Redirect back with a success message
            return redirect('journal.index')->with('message', 'Journal Publication submitted successfully');


        } else {
            
            return redirect('journal.index')->with('message', 'Journal Publication upload Failed.');

        }
    }
    
    //Retrieve records
    public function index()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();
    
        // Debug: Log the user's role ID
        Log::info('User Role ID:', ['role_id' => $user->role_id]);
    
        // Determine which journals to retrieve based on user's role
        if ($user->role_id == 3) {
            // User is an admin (role ID 3): Retrieve all journals
            $journals = Journal::all();
        } elseif ($user->role_id == 1) {
            // User is a student (role ID 1): Retrieve journals submitted by the student
            $journals = Journal::where('user_id', $user->id)->get();
        } else {
            // Handle other roles as needed (optional)
            $journals = collect(); // Default to an empty collection if role is unknown
        }
    
        return view('student.journal_records', compact('journals'));
    }
    
    
}
