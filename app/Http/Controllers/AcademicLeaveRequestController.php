<?php

namespace App\Http\Controllers;

use App\Models\AcademicLeaveRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $request->validate([
            'leave_start_date' => 'required|date',
            'reason_for_leave' => 'required',
            'return_date' => 'required|date',
            // Add more validation rules as needed
        ]);

        $studentId = Auth::user()->student->id ?? null;

        AcademicLeaveRequest::create([
            'student_id' => $studentId,
            'staff_id' => null,
            'leave_start_date' => $request->leave_date,
            'reason_for_leave' => $request->reason_for_leave,
            'return_date' => $request->return_date,
            'ogs_approval_date' => $request->ogs_date,
        ]);

        return redirect()->back()->with("message", "Request Sent Successfully");
    }
}
