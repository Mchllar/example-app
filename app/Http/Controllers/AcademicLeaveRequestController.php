<?php

namespace App\Http\Controllers;

use App\Models\AcademicLeaveRequest;
use App\Models\Student;
use App\Models\Staff;
use App\Models\LeaveApproval;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
            'address' => 'required|string', // Add validation rule for address
        ]);
    
        //dd($validatedData);
        // Create a new academic leave request using the validated data
        AcademicLeaveRequest::create($validatedData);
    
        // Redirect back with success message
        return redirect('/')->with("message", "Request Sent Successfully");
    }
    
    public function viewRequests()
    {
        // Query to get students along with the count of their academic leave requests
        $students = DB::table('academic_leave_requests')
            ->leftJoin('students', 'academic_leave_requests.student_id', '=', 'students.id')
            ->leftJoin('users', 'students.user_id', '=', 'users.id')
            ->select('students.id', 'users.name', DB::raw('count(academic_leave_requests.id) as requests_count'))
            ->groupBy('students.id', 'users.name')
            ->get();
    
        return view('leave.viewRequest', ['students' => $students]);
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
            'user_id'=>'required|exists:users,id',
            'ogs_approval_date'=>'required|date',
            'status' => 'required|string',
        ]);


            LeaveApproval::create($validatedData);

        return redirect('/')->with("message", "Approved");
    }
}
