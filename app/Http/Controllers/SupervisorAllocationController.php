<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupervisorAllocation;
use App\Models\User;
use App\Models\Student;
use App\Models\Staff;

class SupervisorAllocationController extends Controller
{
    public function allocation()
    {
        $supervisors = User::where('role_id', 2)->get();
        $staffMembers = Staff::all();
        $students = Student::all();
        return view('supervisorallocations.supervisorallocation', ['staffMembers' => $staffMembers], compact('supervisors', 'students'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'staff_id' => 'required|exists:staff,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'contract' => 'nullable|string',
            'student_id' => 'required|exists:students,id',
            'supervisor_id' => 'required|exists:users,id|where:role_id,2',
        ]);

        SupervisorAllocation::create($validatedData);

        return redirect()->route('supervisorallocations.supervisorallocation')->with('success', 'Supervisor allocation created successfully!');
    }
}
