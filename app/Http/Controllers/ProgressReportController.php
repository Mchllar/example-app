<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgressReport;
use App\Models\ReportingPeriod;

class ProgressReportController extends Controller
{
    public function index()
{
    $reportingPeriods = ReportingPeriod::where('status', 'Active')->get();

    return view('progress_reports.index', compact('reportingPeriods'));
}
    public function create()
    {
        // Return view for creating a new progress report
        return view('progress_reports.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            // Define your validation rules here
            'student_id' => 'required|exists:students,id',
            'staff_id' => 'required|exists:staff,id',
            'reporting_periods_id' => 'required|exists:reporting_periods,id',
            'goals_set' => 'required|string',
            'progress_report' => 'required|string',
            'problems_issues' => 'required|string',
            'agreed_goals' => 'required|string',
            'students_progress_rating' => 'required|integer',
            'students_completion_rate' => 'nullable|integer',
            'thesis_completion_percentage' => 'nullable|integer|min:0|max:100',
            'completion_estimation' => 'nullable|string',
            'problems_addressed' => 'required|string',
            'concerns_about_student' => 'required|string',
            'inadequate_aspects_comment' => 'required|string',
            'dir_progress_satisfaction' => 'required|boolean',
            'dir_registration_recommendation' => 'nullable|string',
            'dir_unsatisfactory_progress_comments' => 'nullable|string',
        ]);

        // Create a new progress report with the validated data
        ProgressReport::create($validatedData);

        // Redirect to the progress report index page with a success message
        return redirect()->route('progress_reports.index')->with('success', 'Progress report created successfully!');
    }
}
