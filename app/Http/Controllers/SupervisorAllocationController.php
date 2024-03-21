<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\SupervisorAllocation;
use App\Models\User;
use App\Models\Student;

class SupervisorAllocationController extends Controller
{
    public function supervisorAllocation()
    {
        $students = Student::with('supervisors')->get();
        return view('supervisorallocations.index', ['students' => $students]);
    }

    public function allocation()
    {
        $supervisors = User::where('role_id', 2)->get();
        $students = Student::all();
        return view("supervisorallocations.supervisorallocation", compact('supervisors', 'students'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'notes' => 'required|string',
            'contract' => 'required|file',
            'student_id' => 'required|exists:students,id',
            'supervisor_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle file upload
        if ($request->hasFile('contract')) {
            $file = $request->file('contract');
            $path = $file->store('contracts'); // Store the file in the storage/contracts directory
        } else {
            return redirect()
                ->back()
                ->withErrors(['contract' => 'The contract file is required.'])
                ->withInput();
        }

        // Create SupervisorAllocation instance
        $allocation = new SupervisorAllocation;
        $allocation->start_date = $request->start_date;
        $allocation->end_date = $request->end_date;
        $allocation->notes = $request->notes;
        $allocation->contract = $path; // File path
        $allocation->student_id = $request->student_id;
        $allocation->supervisor_id = $request->supervisor_id;
        $allocation->save();

        return redirect()->route('supervisorAllocation')->with('message', 'Supervisor allocation created successfully!');
    }
}
