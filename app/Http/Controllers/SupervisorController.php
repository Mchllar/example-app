<?php

// app/Http/Controllers/SupervisorController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
