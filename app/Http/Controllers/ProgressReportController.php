<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgressReport;

class ProgressReportController extends Controller
{
    public function index()
    {
        // Fetch all progress reports
        $progressReports = ProgressReport::all();

        // Return view with progress reports
        return view('progress_reports.index', compact('progressReports'));
    }

    public function create()
    {
        // Return view for creating a new progress report
        return view('progress_reports.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Define your validation rules here
            'student_id' => 'required|exists:students,id',
            'user_id' =>'required|exists:users,id',
            'staff_id' => 'required|exists:staff,id',
            'reporting_period' => 'required|date',
            'goals_set' => 'required|string',
            'progress_report' => 'required|string',
            'problems_issues' => 'required|string',
            'agreed_goals' => 'required|string',
            'progress_rating' => 'required|integer',
            'completion_rate' => 'nullable|integer',
            'thesis_completion_percentage' => 'nullable|integer|min:0|max:100',
            'completion_estimation' => 'nullable|string',
            'problems_addressed' => 'required|string',
            'concerns_about_student' => 'required|string',
            'inadequate_aspects_comment' => 'required|string',
            'progress_satisfactory' => 'required|boolean',
            'registration_recommendation' => 'nullable|string',
            'unsatisfactory_progress_comments' => 'nullable|string',
            'student_date' => 'required|date',
            'principal_date' => 'required|date',
            'lead_date' => 'required|date',
            'director_name' => 'required|string',
            'director_date' => 'required|date',
        ]);

        // Assuming you have the authenticated user's ID
        $validatedData['user_id'] = auth()->user()->id;

        // Create a new progress report
        ProgressReport::create($validatedData);

        // Redirect to the progress report index page with a success message
        return redirect()->route('progress_reports.index')->with('success', 'Progress report created successfully!');
    }
}
