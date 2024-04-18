<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProgressReport;
use App\Models\ReportingPeriod;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\ProgressReportNotification;


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
        $validatedData = array_merge($validatedData, [
            'goals_set' => '',
            'progress_report' => '',
            'problems_issues' => '',
            'agreed_goals' => '',
            'students_progress_rating' => 0,
            'students_completion_rate' => 0,
            'thesis_completion_percentage' => 0,
            'completion_estimation' => '',
            'problems_addressed' => '',
            'concerns_about_student' => '',
            'inadequate_aspects_comment' => '',
            'dir_progress_satisfaction' => 0,
            'dir_registration_recommendation' => '',
            'dir_unsatisfactory_progress_comments' => '',
            // Add default values for other fields as needed
        ]);
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
            'student_id' => 'nullable|exists:students,id',
            'principal_supervisor_id' => 'nullable|exists:users,id',
            'goals_set' => 'required|string',
            'progress_report' => 'required|string',
            'problems_issues' => 'required|string',
            'agreed_goals' => 'required|string',
            'students_progress_rating' => 'required|integer',
        ]);
    
        // Retrieve session data
        $studentId = session('student_id');
        $reportingPeriod = session('reporting_period');
    
        // Retrieve the progress report record
        $progressReport = ProgressReport::where('student_id', $studentId)
                                        ->where('reporting_periods_id', $reportingPeriod)
                                        ->first();
    
        // Generate a unique token for the student and reporting period combination
        $token = md5($studentId . $reportingPeriod);
    
        // Store the token in the session for later use in section C
        session(['section_c_token' => $token]);
    
        // Retrieve the principal supervisor's ID from the progress report
        $principalSupervisorId = $progressReport->principal_supervisor_id ?? null;
    
        // Ensure that the progress report exists and has a principal supervisor ID
        if ($progressReport && $principalSupervisorId) {
            // Retrieve the student's name from the data source
            $student = $progressReport->student;
            $studentName = $student ? $student->user->name : 'Student'; // Default to 'Student' if name not found
    
            // Update the progress report record from section A
            $progressReport->update($validatedData);
    
            // Generate the link to section C with the token as a parameter
            $link = route('progress_reports.sectionC', ['token' => $token]);
    
            // Send email notification to the principal supervisor
            $principalSupervisor = User::find($principalSupervisorId);
            if ($principalSupervisor) {
                $emailContent = "Please fill in the progress report for your student: $studentName. Click the following link to proceed: $link";
    
                Mail::to($principalSupervisor->email)->send(new ProgressReportNotification($emailContent)); // Adjust the Mailable class and parameters accordingly
            }
        } else {
            // Handle the case where the progress report or principal supervisor ID is not found
            // You can redirect back with an error message or handle it based on your application's logic
        }
    
        return redirect('/')->with('message', 'Next section to be filled by Supervisor');
    }

    public function sectionC()
    {
        // Retrieve token from session
        $token = session('section_c_token');
    
        // Check if the token exists and has the correct format
        if ($token && strpos($token, '_') !== false) {
            // Unravel the token to extract student ID and reporting period
            $tokenParts = explode('_', $token);
            list($studentId, $reportingPeriod) = $tokenParts;
    
            // Retrieve the progress report data for the student and reporting period
            $progressReport = ProgressReport::where('student_id', $studentId)
                                            ->where('reporting_periods_id', $reportingPeriod)
                                            ->first();
    
            // Pass the progress report data to the view
            return view('progress_reports.sectionC', compact('progressReport', 'studentId', 'reportingPeriod'));
        } else {
            // Handle the case where the token is missing or has an incorrect format
            // You can redirect back with an error message or handle it based on your application's logic
        }
    }
    
    
    public function storeSectionC(Request $request)
    {
        // Retrieve token from session
        $token = session('section_c_token');
    
        // Unravel the token to extract student ID and reporting period
        $tokenParts = explode('_', $token);
        if (count($tokenParts) === 2) {
            list($studentId, $reportingPeriod) = $tokenParts;
        } else {
            // Handle the case where the token format is incorrect
            // You can redirect back with an error message or handle it based on your application's logic
        }
    
        // Retrieve session data if not already defined
        if (!isset($studentId) || !isset($reportingPeriod)) {
            $studentId = session('student_id');
            $reportingPeriod = session('reporting_period');
        }
    
        $validatedData = $request->validate([
            'student_id' => 'nullable|exists:students,id',
            'principal_supervisor_id' => 'nullable|exists:users,id',
            'students_completion_rate' => 'nullable|integer',
            'thesis_completion_percentage' => 'nullable|integer|min:0|max:100',
            'completion_estimation' => 'nullable|string',
            'problems_addressed' => 'required|string',
            'concerns_about_student' => 'required|string',
            'inadequate_aspects_comment' => 'required|string',
        ]);
    
        // Retrieve the progress report record
        $progressReport = ProgressReport::where('student_id', $studentId)
            ->where('reporting_periods_id', $reportingPeriod)
            ->first();
    
        if ($progressReport) {
            $progressReport->update($validatedData);
        } else {
            // Handle the case where the progress report record is not found
        }
    
        return redirect('/')->with('message', 'To be completed by Director of OGS');
    }
    
    public function sectionD()
    {
        return view('progress_reports.sectionD');
    }
    public function storeSectionD(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'nullable|exists:students,id',
            'principal_supervisor_id' => 'nullable|exists:users,id',
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
