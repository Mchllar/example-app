<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\SupervisorAllocation;
use App\Models\User;
use App\Models\Student;
use App\Models\ChangeSupervisorRequest;

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
            'status' => 'required|string',
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
    public function changeSupervisor()
    {
        return view('supervisorallocations.changeSupervisor');
    }

    public function storeChangeSupervisor(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'thesis_title' => 'required|string',
            'proposed_supervisor_1' => 'nullable|string',
            'proposed_supervisor_2' => 'nullable|string',
            'proposed_supervisor_3' => 'nullable|string',
            'effective_date' => 'required|date',
            'reason_for_change' => 'required|string',
        ]);

        // Create a new instance of ChangeSupervisorRequest model
        $changeSupervisorRequest = new ChangeSupervisorRequest();

        // Populate the model instance with validated data
        $changeSupervisorRequest->student_id = $validatedData['student_id'];
        $changeSupervisorRequest->thesis_title = $validatedData['thesis_title'];
        $changeSupervisorRequest->proposed_supervisor_1 = $validatedData['proposed_supervisor_1'];
        $changeSupervisorRequest->proposed_supervisor_2 = $validatedData['proposed_supervisor_2'];
        $changeSupervisorRequest->proposed_supervisor_3 = $validatedData['proposed_supervisor_3'];
        $changeSupervisorRequest->effective_date = $validatedData['effective_date'];
        $changeSupervisorRequest->reason_for_change = $validatedData['reason_for_change'];

        // Save the model instance
        $changeSupervisorRequest->save();

        return redirect('/')->with('message', 'Change Supervisor request submitted successfully.');
  }

    
        
}