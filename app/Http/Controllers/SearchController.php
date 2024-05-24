<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function supervisorAllocation(Request $request)
    {
        // Retrieve search query parameters from the request
        $searchQuery = $request->input('search');
    
        // Build a query to filter students based on the search query
        $studentsQuery = Student::query(); // Start with a base query
    
        if ($searchQuery) {
            // Filter students by name or student number based on the search query
            $studentsQuery->whereHas('user', function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%');
            })
            ->orWhere('student_number', 'like', '%' . $searchQuery . '%');
        }
    
        // Execute the query and get the filtered list of students
        $students = $studentsQuery->with('user')->get(); // Eager load 'user' relationship
    
        return view('staff.correction_reminders', ['students' => $students]);
    }
}
