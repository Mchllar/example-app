<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupervisorAllocation; 
use App\Models\Thesis; 

class SuperviseeController extends Controller
{

    public function viewSupervisee()
{
    // Retrieve supervisor allocations with related student, program, user, and notices data
    $supervisorAllocations = SupervisorAllocation::with(['student.program', 'student.user', 'student.notices'])->get();

    // Define an empty collection to store theses
    $theses = collect();

    // Loop through each supervisor allocation
    foreach ($supervisorAllocations as $allocation) {
        // Retrieve the student associated with the current allocation
        $student = $allocation->student;

        // Check if the student has a user_id
        if ($student->user_id) {
            // Retrieve theses related to the student's user_id
            $thesesForStudent = Thesis::where('user_id', $student->user_id)->get();

            // Check if the student has a thesis submission
            if ($thesesForStudent->isNotEmpty()) {
                // Add the thesis submission to the $theses collection
                $theses = $theses->merge($thesesForStudent);
            }
        }
    }

    return view('supervisor.view_supervisee', compact('supervisorAllocations', 'theses'));
}

    
    
    
    
    
    
    
}
