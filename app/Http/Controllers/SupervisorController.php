<?php

// app/Http/Controllers/SupervisorController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChangeSupervisorRequest;


class SupervisorController extends Controller
{
    public function assignSupervisors()
{
    $students = User::where('role', 'student')->get();
    $supervisors = User::where('role', 'supervisor')->get();

    return view('supervisor.assign_supervisors', compact('students', 'supervisors'));
}

    public function storeAssignedSupervisor(Request $request, User $student)
    {
        $validatedData = $request->validate([
            'supervisor_id' => 'required|exists:users,id'
        ]);

        $student->supervisor_id = $validatedData['supervisor_id'];
        $student->save();

        return redirect()->back()->with('success', 'Supervisor assigned successfully!');
    }

    public function showChangeSupervisorRequestForm()
{
    return view('student.change_supervisor_request');
}


    public function submitChangeSupervisorRequest(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:users,id',
            'title_of_thesis' => 'required|string',
            // Add more validation rules as per your form fields
        ]);

        $changeRequest = new ChangeSupervisorRequest();
        $changeRequest->fill($validatedData);
        $changeRequest->save();

        return redirect()->back()->with('success', 'Change supervisor request submitted successfully!');
    }
}
