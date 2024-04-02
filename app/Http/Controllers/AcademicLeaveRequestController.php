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
    

    public function approve()
    {
             return view('leave.approval');
    }

    public function storeApprove(Request $request)
    {
        $validatedData = $request->validate([
            'staff_id'=>'required|exists:students,id',
            'ogs_date'=>'required|date',
            'status' => 'required|string',
        ]);


            LeaveApproval::create($validatedData);

        return redirect()->route('/')->back()->with("message", "Approved");
    }
}
