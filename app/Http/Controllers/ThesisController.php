<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ThesisController extends Controller
{
    public function thesisSubmission() {
        return view('student.thesis_submission');
    }

    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            'journal_title' => 'required', 
            'title_of_paper' => 'required',
            'submission_type' => 'required',
            'thesis_document' => 'required|file|mimes:pdf',
            'correction_form' => 'required|file|mimes:pdf',
            'correction_summary' => 'required|file|mimes:pdf',
        ]);
    
        $user_id = Auth::user()->id;
    
        // Create a new Thesis instance
        $thesis = new Thesis();
        $thesis->user_id = $user_id;
        $thesis->submission_type = $request->submission_type;
    
        // Handle file uploads
        if ($request->hasFile('thesis_document') && $request->hasFile('correction_form') && $request->hasFile('correction_summary')) {
            $thesis_document = $request->file('thesis_document');
            $correction_form = $request->file('correction_form');
            $correction_summary = $request->file('correction_summary');
    
            // Store files
            $thesis_document_path = 'public/files/' . time() . '_' . $thesis_document->getClientOriginalName();
            $correction_form_path = 'public/files/' . time() . '_' . $correction_form->getClientOriginalName();
            $correction_summary_path = 'public/files/' . time() . '_' . $correction_summary->getClientOriginalName();
    
            // Move files to storage
            $thesis_document->storeAs('public/files', $thesis_document_path);
            $correction_form->storeAs('public/files', $correction_form_path);
            $correction_summary->storeAs('public/files', $correction_summary_path);
    
            // Associate file paths with the Thesis instance
            $thesis->thesis_document = $thesis_document_path;
            $thesis->correction_form = $correction_form_path;
            $thesis->correction_summary = $correction_summary_path;
    
            // Save the Thesis instance to the database
            $thesis->save();
    
            return redirect()->back()->with('success', 'Thesis submitted successfully!');
        } else {
            return redirect()->back()->with('error', 'File upload failed. Please make sure all required files are uploaded.');
        }
    }

    public function index()
    {
        //return view('student.thesis_records');
        //Retrieve the currently authenticated user
        $user = auth()->user();
    
        //Retrieve conferences submitted by the authenticated user
       $thesis = Thesis::where('user_id', auth()->id())->get();
                
       return view('student.thesis_records', compact('thesis'));
   }

   public function update(Request $request, $id)
   {
       // Validate the request data
       $request->validate([
           'thesis_document' => 'required|file|mimes:pdf',
       ]);
   
       // Retrieve the thesis record to update
       $thesis = Thesis::findOrFail($id);
   
       // Get the user ID
       $user_id = Auth::user()->id;
   
       // Ensure the authenticated user owns the thesis record
       if ($thesis->user_id != $user_id) {
           return response()->json(['error' => 'Unauthorized'], 403);
       }
   
       // Handle the file upload
       if ($request->hasFile('thesis_document')) {
           // Get the new file
           $newFile = $request->file('thesis_document');
           // Generate a unique file name
           $newFileName = time() . '_' . $newFile->getClientOriginalName();
           // Store the new file
           $newFile->storeAs('public/files', $newFileName);
           // Update the thesis document path
           $thesis->thesis_document = 'public/files/' . $newFileName;
           // Save the updated thesis record
           $thesis->save();
           // Return a success response
           return response()->json(['message' => 'Thesis document updated successfully'], 200);
       } else {
           // Return an error response if no file is provided
           return response()->json(['error' => 'No file provided'], 400);
       }
   }
   
}




