<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\BoardRequestApproval;
use App\Models\SupervisorAllocation;
use Illuminate\Support\Facades\Mail;
use App\Models\SchoolRequestApproval;
use App\Models\ChangeSupervisorRequest;
use App\Models\DirectorRequestApproval;
use Illuminate\Support\Facades\Validator;
use App\Mail\ChangeSupervisorNotification;

class SupervisorAllocationController extends Controller
{
    public function supervisorAllocation(Request $request)
    {
        // Retrieve search query parameters from the request
        $searchQuery = $request->input('search');
    
        // Build a query to filter students based on the search query
        $studentsQuery = Student::with('supervisors'); // Start with a base query
    
        if ($searchQuery) {
            // Filter students by name and program based on the search query
            $studentsQuery->whereHas('user', function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%');
            })
            ->orWhereHas('program', function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%');
            });
        }
    
        // Execute the query and get the filtered list of students
        $students = $studentsQuery->get();
    
        return view('supervisorallocations.index', ['students' => $students]);
    }
    
    public function supervisorStudentAllocation(Request $request)
    {
        // Retrieve search query parameters from the request
    $searchQuery = $request->input('search');

    // Build a query to filter supervisors based on the search query
    $supervisorsQuery = User::where('role_id', 2); // Start with a base query

    if ($searchQuery) {
        // Filter supervisors by name
        $supervisorsQuery->where('name', 'like', '%' . $searchQuery . '%');
    }

    // Execute the query and get the filtered list of supervisors
    $supervisors = $supervisorsQuery->get();

    return view('supervisorallocations.supervisorIndex', ['supervisors' => $supervisors]);
    }
    
public function allocationStudent()
    {
        $supervisors = User::where('role_id', 2)->get();
        $students = Student::all();
        return view("supervisorallocations.studentAllocation", compact('supervisors', 'students'));
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
            'contract' => 'required|file|mimes:pdf,doc,docx',
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
            $path = $file->store('contracts', 'public'); // Store the file in the public storage
        }

        // Create SupervisorAllocation instance
        $allocation = new SupervisorAllocation;
        $allocation->start_date = $request->start_date;
        $allocation->end_date = $request->end_date;
        $allocation->notes = $request->notes;
        $allocation->contract = $path ?? null; // File path
        $allocation->student_id = $request->student_id;
        $allocation->supervisor_id = $request->supervisor_id;
        $allocation->status = $request->status;
        $allocation->save();

        return redirect()->route('supervisorAllocation')->with('message', 'Supervisor allocation created successfully!');
    }

    public function edit($id)
    {
        // Retrieve the allocation to edit
        $allocation = SupervisorAllocation::findOrFail($id);
    
        // Retrieve the list of students and supervisors to populate the dropdowns
        $students = Student::all();
        $supervisors = User::where('role_id', 2)->get();
    
        // Return the edit view with the allocation data
        return view('supervisorallocations.edit', compact('allocation', 'students', 'supervisors'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'notes' => 'required|string',
            'contract' => 'nullable|file|mimes:pdf,doc,docx',
            'student_id' => 'required|exists:students,id',
            'supervisor_id' => 'required|exists:users,id',
            'status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Retrieve the allocation to update
        $allocation = SupervisorAllocation::findOrFail($id);

        // Update the allocation details
        $allocation->start_date = $request->start_date;
        $allocation->end_date = $request->end_date;
        $allocation->notes = $request->notes;
        $allocation->student_id = $request->student_id;
        $allocation->supervisor_id = $request->supervisor_id;
        $allocation->status = $request->status;

        // Handle file upload if a new file is provided
        if ($request->hasFile('contract')) {
            $file = $request->file('contract');
            $path = $file->store('contracts', 'public');
            $allocation->contract = $path;
        }

        // Save the updated allocation
        $allocation->save();

        return redirect()->route('supervisorAllocation')->with('message', 'Supervisor allocation updated successfully!');
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
        // Fetch all users with the staff role
        $staffUsers = User::where('role_id', 3)->get();

        // Send email to each staff user
        foreach ($staffUsers as $user) {
        Mail::to($user->email)->send(new ChangeSupervisorNotification($changeSupervisorRequest));
    }


        return redirect('/')->with('message', 'Change Supervisor request submitted successfully, email sent to Administrator.');
  }

  public function reviewChangeSupervisorRequests()
  {
      $changeRequests = ChangeSupervisorRequest::with('student')->get();
      $groupedRequests = $changeRequests->groupBy('student_id');
  
      return view('supervisorallocations.reviewChangeSupervisorRequests', ['groupedRequests' => $groupedRequests]);
  }
  
  public function viewStudentForm($studentId)
  {
      $student = Student::findOrFail($studentId);
      $form = ChangeSupervisorRequest::where('student_id', $studentId)->first();
  
      return view('supervisorallocations.viewStudentForm', ['student' => $student, 'form' => $form]);
  }

  public function storeSchoolApproval(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'student_id' => 'nullable|exists:students,id',
            'status' => 'nullable|in:approved,denied',
        ]);
        //dd($validatedData);

        SchoolRequestApproval::create($validatedData);

        return redirect('/')->with('message', 'Request approved!');
    }

    public function storeBoardApproval(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'student_id' => 'required|exists:students,id',
            'status' => 'required|in:approved,denied',
        ]);

        BoardRequestApproval::create($validatedData);

        return redirect('/')->with('message', 'Request approved!');
    }

    public function storeDirectorApproval(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'student_id' => 'required|exists:students,id',
            'status' => 'required|in:approved,denied',
        ]);

        DirectorRequestApproval::create($validatedData);

        return redirect()->route('supervisorAllocation')->with('message', 'Request approved start here!');
    }
        
}