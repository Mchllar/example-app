<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\SupervisorAllocation;

class SupervisorAllocationController extends Controller
{
    public function allocation()
    {
        // Retrieve all supervisor allocations with related data
        $allocations = SupervisorAllocation::with(['student', 'supervisor'])->get();
        // Retrieve all students with related data
        $students = Student::with(['user.country', 'user.religion', 'user.gender', 'program', 'supervisorAllocation'])->get();
        
        $supervisors = User::where('role_id', 2)->get(); // Assuming 'supervisor' role has id 2

        return view('supervisorallocations.supervisorallocation', compact('allocations', 'students', 'supervisors'));
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'supervisor_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            // Add more validation rules as needed
        ]);

        // Create new supervisor allocation
        SupervisorAllocation::create([
            'student_id' => $request->student_id,
            'supervisor_id' => $request->supervisor_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'notes' => $request->notes,
            'contract' => $request->contract,
        ]);

        // Redirect back with success message
        return redirect('/allocation')->with('message', 'Supervisor allocation created successfully.');
    }
}
