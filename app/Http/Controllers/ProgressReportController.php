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
        return view('progress_reports.sectionA', compact('supervisors'));
    }

    public function storeSectionA(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'staff_id' => 'required|exists:staff,id',
            'reporting_periods_id' => 'required|exists:reporting_periods,id',
        ]);

        Session::put('sectionA_data', $validatedData);
        return redirect('/sectionB')->route('progress_reports.sectionB');
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
        return redirect()->route('progress_reports.finalSubmission');
    }

    public function final()
    {
        return view('progress_reports.finalSubmission');
    }

    public function finalStore(Request $request)
    {
        $combinedData = array_merge(
            Session::get('sectionA_data', []),
            Session::get('sectionB_data', []),
            Session::get('sectionC_data', []),
            $request->all()
        );

        try {
            DB::beginTransaction();
            ProgressReport::create($combinedData);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // Log or handle the exception
            return redirect()->back()->with('error', 'An error occurred while creating the progress report.');
        }

        Session::forget('sectionA_data');
        Session::forget('sectionB_data');
        Session::forget('sectionC_data');

        return redirect()->route('progress_reports.index')->with('success', 'Progress report created successfully!');
    }
}

//public function store(Request $request)
//{
    // Validate the incoming request data
//    $validatedData = $request->validate([
      // Define your validation rules here
//        'student_id' => 'required|exists:students,id',
//        'staff_id' => 'required|exists:staff,id',
//        'reporting_periods_id' => 'required|exists:reporting_periods,id',
//        'goals_set' => 'required|string',
//        'progress_report' => 'required|string',
//        'problems_issues' => 'required|string',
//        'agreed_goals' => 'required|string',
//        'students_progress_rating' => 'required|integer',
//        'students_completion_rate' => 'nullable|integer',
//        'thesis_completion_percentage' => 'nullable|integer|min:0|max:100',
//        'completion_estimation' => 'nullable|string',
//        'problems_addressed' => 'required|string',
//        'concerns_about_student' => 'required|string',
//        'inadequate_aspects_comment' => 'required|string',
//        'dir_progress_satisfaction' => 'required|boolean',
//        'dir_registration_recommendation' => 'nullable|string',
//        'dir_unsatisfactory_progress_comments' => 'nullable|string',
//    ]);

    // Create a new progress report with the validated data
   // ProgressReport::create($validatedData);

    // Redirect to the progress report index page with a success message
    //return redirect()->route('progress_reports.index')->with('success', 'Progress report created successfully!');
//}