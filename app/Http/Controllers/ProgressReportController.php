<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProgressReport;
use App\Models\ReportingPeriod;
use Illuminate\Support\Facades\Session;

class ProgressReportController extends Controller
{
    public function index()
    {
        $reportingPeriods = ReportingPeriod::where('status', 'Active')->get();
        return view('progress_reports.index', compact('reportingPeriods'));
    }

    public function create()
    {
        $supervisors = User::where('role_id', 2)->get();
        return view('progress_reports.create', compact('supervisors'));
    }

    public function sectionA()
    {
        $supervisors = User::where('role_id', 2)->get();
        $periods = ReportingPeriod::all();
        return view('progress_reports.sectionA', compact('supervisors', 'periods'));
    }

    public function storeSectionA(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'nullable|exists:students,id',
            'principal_supervisor_id' => 'nullable|exists:users,id',
            'lead_supervisor_id' => 'nullable|exists:users,id',
            'mode_of_study' => 'nullable|string',
            'reporting_period' => 'nullable|exists:reporting_periods,id',
        ]);
        //dd($validatedData);
        // Store student_id and reporting_period in session
        session(['student_id' => $validatedData['student_id']]);
        session(['reporting_period' => $validatedData['reporting_period']]);
        $progressReport = ProgressReport::updateOrCreate(
            [
                'student_id' => $validatedData['student_id'],
                'reporting_periods_id' => $validatedData['reporting_period'],
            ],
            $validatedData
        );

        return redirect()->route('progress_reports.sectionB');
    }

    public function sectionB()
    {
        return view('progress_reports.sectionB');
    }

    public function storeSectionB(Request $request)
{
    $validatedData = $request->validate([
        'goals_set' => 'required|string',
        'progress_report' => 'required|string',
        'problems_issues' => 'required|string',
        'agreed_goals' => 'required|string',
        'students_progress_rating' => 'required|integer',
    ]);

    // Retrieve session data
    $studentId = session('student_id');
    $reportingPeriod = session('reporting_period');

    // Update the progress report record from section A
    $progressReport = ProgressReport::where('student_id', $studentId)
                                    ->where('reporting_periods_id', $reportingPeriod)
                                    ->update($validatedData);

    return redirect()->route('progress_reports.sectionC');
}
    public function sectionC()
    {
        return view('progress_reports.sectionC');
    }

    public function storeSectionC(Request $request)
    {
        $validatedData = $request->validate([
            'students_completion_rate' => 'nullable|integer',
            'thesis_completion_percentage' => 'nullable|integer|min:0|max:100',
            'completion_estimation' => 'nullable|string',
            'problems_addressed' => 'required|string',
            'concerns_about_student' => 'required|string',
            'inadequate_aspects_comment' => 'required|string',
        ]);
    
        // Retrieve session data
        $studentId = session('student_id');
        $reportingPeriod = session('reporting_period');
    
        // Update the progress report record from section A
        $progressReport = ProgressReport::where('student_id', $studentId)
                                        ->where('reporting_periods_id', $reportingPeriod)
                                        ->update($validatedData);
    
        return redirect()->route('progress_reports.sectionD');
    }

    public function sectionD()
    {
        return view('progress_reports.sectionD');
    }
    public function storeSectionD(Request $request)
    {
        $validatedData = $request->validate([
            'dir_progress_satisfaction' => 'required|string',
            'dir_registration_recommendation' => 'nullable|string',
            'dir_unsatisfactory_progress_comments' => 'nullable|string',
        ]);
    
        // Retrieve session data
        $studentId = session('student_id');
        $reportingPeriod = session('reporting_period');
    
        // Update the progress report record from section A
        $progressReport = ProgressReport::where('student_id', $studentId)
                                        ->where('reporting_periods_id', $reportingPeriod)
                                        ->update($validatedData);
    
        return redirect('/')->with('message', 'Updated successfully');
    }
}
