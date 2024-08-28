<?php

namespace App\Http\Controllers;

use App\Models\AcademicLeaveRequest;
use App\Models\Student;
use App\Models\FacultyLeaveApproval;
use App\Models\OgsLeaveApproval;
use App\Models\RegistrarLeaveApproval;
use App\Models\Staff;
use App\Models\Program;
use App\Models\LeaveApproval;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Mail\AcademicLeaveRequestNotification;
use App\Mail\AcademicLeaveRequestApproval;
use Illuminate\Support\Facades\Mail;

class AcademicLeaveRequestController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $studentNumber = null;

        // Check if the user is authenticated and has a student record
        if ($user && $user->student) {
            $studentNumber = $user->student->student_number;
        }

        return view('leave.academic_leave', compact('studentNumber'));
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'student_id' => 'required|exists:students,id',
        'leave_start_date' => 'required|date',
        'reason_for_leave' => 'required|string',
        'return_date' => 'required|date',
        'address' => 'required|string',
    ]);

    // Create a new academic leave request using the validated data
    $academicLeaveRequest = AcademicLeaveRequest::create($validatedData);

    // Get all staff users with role_id=3
    $staffUsers = User::where('role_id', 3)->get();

    // Send an email to each staff user
    foreach ($staffUsers as $staffUser) {
        Mail::to($staffUser->email)->send(new AcademicLeaveRequestNotification($academicLeaveRequest));
    }

    // Redirect back with success message
    return redirect('/')->with("message", "Request Sent Successfully");
}


public function viewRequests(Request $request)
{
    $searchQuery = $request->input('search');
    $programId = $request->input('program');

    // Start the query to get students along with their approval statuses
    $studentsQuery = DB::table('academic_leave_requests')
        ->leftJoin('students', 'academic_leave_requests.student_id', '=', 'students.id')
        ->leftJoin('users', 'students.user_id', '=', 'users.id')
        ->leftJoin('programs', 'students.program_id', '=', 'programs.id')
        ->leftJoin('faculty_leave_approvals', 'academic_leave_requests.id', '=', 'faculty_leave_approvals.academic_leave_request_id')
        ->leftJoin('ogs_leave_approvals', 'academic_leave_requests.id', '=', 'ogs_leave_approvals.academic_leave_request_id')
        ->leftJoin('registrar_leave_approvals', 'academic_leave_requests.id', '=', 'registrar_leave_approvals.academic_leave_request_id')
        ->leftJoin('leave_approvals', 'academic_leave_requests.id', '=', 'leave_approvals.academic_leave_request_id')
        ->select(
            'students.student_number',
            'students.id',
            'users.name as student_name',
            'programs.name as program_name',
            DB::raw('count(academic_leave_requests.id) as requests_count'),
            'leave_approvals.status as supervisor_approval_status',
            'faculty_leave_approvals.status as faculty_approval_status',
            'ogs_leave_approvals.status as ogs_approval_status',
            'registrar_leave_approvals.status as registrar_approval_status',
            'academic_leave_requests.id as academic_leave_request_id'
        )
        ->groupBy(
            'students.student_number',
            'students.id',
            'users.name',
            'programs.name',
            'leave_approvals.status',
            'faculty_leave_approvals.status',
            'ogs_leave_approvals.status',
            'registrar_leave_approvals.status',
            'academic_leave_requests.id'
        )
        ->orderBy('users.name', 'asc');

        if (auth()->check() && auth()->user()->role->name === 'supervisor') {
            // Get the supervisor's ID
            $supervisorId = Auth::id();
        
            // Filter students by supervisor allocation
            $studentsQuery->whereExists(function ($query) use ($supervisorId) {
                $query->select(DB::raw(1))
                    ->from('supervisor_allocations')
                    ->whereColumn('supervisor_allocations.student_id', 'students.id')
                    ->where('supervisor_allocations.supervisor_id', $supervisorId);
            });
        }
    

    // Apply search filter by student name or program name
    if ($searchQuery) {
        $studentsQuery->where(function ($query) use ($searchQuery) {
            $query->where('users.name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('programs.name', 'like', '%' . $searchQuery . '%');
        });
    }

    // Apply filter by program ID
    if ($programId) {
        $studentsQuery->where('students.program_id', $programId);
    }

    // Paginate the results
    $students = $studentsQuery->paginate(10)->appends([
        'search' => $searchQuery,
        'program' => $programId,
    ]);

    // Retrieve all programs to populate the dropdown
    $programs = Program::all();

    return view('leave.viewRequest', ['students' => $students, 'programs' => $programs]);
}




public function approve(Request $request)
{
    // Get the student ID from the request
    $studentId = $request->input('student_id');

    // Fetch the academic leave request for the specified student
    $academicLeaveRequest = AcademicLeaveRequest::where('student_id', $studentId)->first();

    // Check if the academic leave request exists
    if (!$academicLeaveRequest) {
        // Handle the case where the academic leave request does not exist
        abort(404, 'Academic leave request not found.');
    }

    // Pass the academic leave request data to the view
    return view('leave.approval', compact('academicLeaveRequest'));
}


public function storeApprove(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'ogs_approval_date' => 'required|date',
        'status' => 'required|string',
        'academic_leave_request_id' => 'required|exists:academic_leave_requests,id', // Validate the academic_leave_request_id
    ]);

    // Create a new leave approval record
    $leaveApproval = LeaveApproval::create($validatedData);

    // Retrieve the academic leave request associated with the approval
    $academicLeaveRequest = $leaveApproval->academicLeaveRequest;

    // Get the student associated with the academic leave request
    $student = $academicLeaveRequest->student;

    // Send an email notification to the student
    Mail::to($student->user->email)->send(new AcademicLeaveRequestApproval($academicLeaveRequest)); // Corrected mail class

    // Redirect back with success message
    return redirect('/')->with("message", "Done");
}

public function facultyApprove(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'ogs_approval_date' => 'required|date',
        'status' => 'required|string',
        'academic_leave_request_id' => 'required|exists:academic_leave_requests,id', // Validate the academic_leave_request_id
    ]);

    // Create a new leave approval record
    $leaveApproval = FacultyLeaveApproval::create($validatedData);

    // Retrieve the academic leave request associated with the approval
    $academicLeaveRequest = $leaveApproval->academicLeaveRequest;

    // Get the student associated with the academic leave request
    $student = $academicLeaveRequest->student;

    // Send an email notification to the student
    Mail::to($student->user->email)->send(new AcademicLeaveRequestApproval($academicLeaveRequest)); // Corrected mail class

    // Redirect back with success message
    return redirect('/')->with("message", "Done");
}

public function ogsApprove(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'ogs_approval_date' => 'required|date',
        'status' => 'required|string',
        'academic_leave_request_id' => 'required|exists:academic_leave_requests,id', // Validate the academic_leave_request_id
    ]);

    // Create a new leave approval record
    $leaveApproval = OgsLeaveApproval::create($validatedData);

    // Retrieve the academic leave request associated with the approval
    $academicLeaveRequest = $leaveApproval->academicLeaveRequest;

    // Get the student associated with the academic leave request
    $student = $academicLeaveRequest->student;

    // Send an email notification to the student
    Mail::to($student->user->email)->send(new AcademicLeaveRequestApproval($academicLeaveRequest)); // Corrected mail class

    // Redirect back with success message
    return redirect('/')->with("message", "Done");
}

public function registrarApprove(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'ogs_approval_date' => 'required|date',
        'status' => 'required|string',
        'academic_leave_request_id' => 'required|exists:academic_leave_requests,id', // Validate the academic_leave_request_id
    ]);

    // Create a new leave approval record
    $leaveApproval = RegistrarLeaveApproval::create($validatedData);

    // Retrieve the academic leave request associated with the approval
    $academicLeaveRequest = $leaveApproval->academicLeaveRequest;

    // Get the student associated with the academic leave request
    $student = $academicLeaveRequest->student;

    // Send an email notification to the student
    Mail::to($student->user->email)->send(new AcademicLeaveRequestApproval($academicLeaveRequest)); // Corrected mail class

    // Redirect back with success message
    return redirect('/')->with("message", "Done");
}

public function clearStatus($academicLeaveRequestId)
{
    // Store the cleared academic leave request ID in the session
    $clearedRequests = session()->get('cleared_requests', []);
    $clearedRequests[] = $academicLeaveRequestId;
    session()->put('cleared_requests', $clearedRequests);

    return redirect()->back()->with('message', 'Academic leave request cleared.');
}



}