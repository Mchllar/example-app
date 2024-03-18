<?php

namespace App\Http\Controllers;

use App\Models\AcademicLeaveRequest;
use Illuminate\Http\Request;

class AcademicLeaveRequestController extends Controller
{
    public function create()
    {
        return view('leave.academic_leave');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'leave_date' => 'required|date',
            'leave_month' => 'required',
            'leave_year' => 'required',
            'reason_for_leave' => 'required',
            'return_date' => 'required|date',
            // Add more validation rules as needed
        ]);

        AcademicLeaveRequest::create([
            'student_id' => auth()->user()->student->id,
            'staff_id' => null, // Assuming there's no staff involved in this request initially
            'user_id' => auth()->id(),
            'address' => $request->address,
            'leave_date' => $request->leave_date,
            'leave_month' => $request->leave_month,
            'leave_year' => $request->leave_year,
            'reason_for_leave' => $request->reason_for_leave,
            'return_date' => $request->return_date,
            'ogs_date' => $request->ogs_date,
        ]);

        // Redirect or return response as needed
    }
}
