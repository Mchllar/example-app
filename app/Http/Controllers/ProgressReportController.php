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
        // Validate the request data
        $validatedData = $request->validate([
            'reporting_period' => 'required',
            'goals_set' => 'required',
            'progress_report' => 'required',
            'problems_issues' => 'required',
            'agreed_goals' => 'required',
            'progress_rating' => 'required',
            'seminars_presentations' => 'required',
            'supervisor_comments' => 'required',
            'director_comments' => 'required',
        ]);

        // Create a new progress report
        $progressReport = ProgressReport::create($validatedData);

        // Redirect to the progress report index page with a success message
        return redirect()->route('progress_reports.index')->with('success', 'Progress report created successfully!');
    }
}
