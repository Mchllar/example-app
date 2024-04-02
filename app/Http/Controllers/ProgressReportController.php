<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProgressReport;
use App\Models\ReportingPeriod;
use Illuminate\Support\Facades\DB;
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
            'lead_supervisor_id' =>'nullable|exists:users,id',
            'mode_of_study' => 'nullable|string',
            'reporting_period' => 'nullable|exists:reporting_periods,id',
        ]);
        //dd($validatedData);

        Session::put('sectionA_data', $validatedData);
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

        Session::put('sectionB_data', $validatedData);
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

        Session::put('sectionC_data', $validatedData);
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

        Session::put('sectionD_data', $validatedData);
        return redirect()->route('progress_reports.final_submission');
    }

    public function showFinalSubmissionPage()
    {
        return view('progress_reports.final_submission');
    }

    public function finalSubmission(Request $request)
    {
        // Merge the session data and the form data
        $combinedData = array_merge(
            Session::get('sectionA_data', []),
            Session::get('sectionB_data', []),
            Session::get('sectionC_data', []),
            Session::get('sectionD_data', [])
        );
         //dd($combinedData);
        
            // Create a new ProgressReport instance with the combined data and save it to the database
            ProgressReport::create($combinedData);
            DB::commit();
       

        // Clear session data
        Session::forget('sectionA_data');
        Session::forget('sectionB_data');
        Session::forget('sectionC_data');
        Session::forget('sectionD_data');

        return redirect()->route('progress_reports.index')->with('message', 'Progress report created successfully!');
    }
}