<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Program;
use App\Models\School;
use Illuminate\Http\Request;
use App\Models\BoardRequestApproval;
use App\Models\SupervisorAllocation;
use Illuminate\Support\Facades\Mail;
use App\Models\SchoolRequestApproval;
use App\Models\ChangeSupervisorRequest;
use App\Models\DirectorRequestApproval;
use Illuminate\Support\Facades\Validator;
use App\Mail\ChangeSupervisorNotification;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SupervisorAllocationController extends Controller
{
    public function supervisorAllocation(Request $request)
    {
        $searchQuery = $request->input('search');
        $programId = $request->input('program');
    
        $studentsQuery = Student::with('supervisors'); // Start with a base query
    
        if ($searchQuery) {
            $studentsQuery->whereHas('user', function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%');
            });
        }
    
        if ($programId) {
            $studentsQuery->where('program_id', $programId);
        }
    
        // Order the students by their names in alphabetical order
        $studentsQuery->orderBy(User::select('name')->whereColumn('users.id', 'students.user_id'));
    
        $students = $studentsQuery->paginate(10)->appends([
            'search' => $searchQuery,
            'program' => $programId,
        ]);
    
        // Retrieve all programs to populate the dropdown
        $programs = Program::all();
    
        return view('supervisorallocations.index', ['students' => $students, 'programs' => $programs]);
    }
    
      
    public function supervisorStudentAllocation(Request $request)
    {
        $searchQuery = $request->input('search');
        $schoolId = $request->input('school');
    
        // Base query for supervisors with a role_id of 2
        $supervisorsQuery = User::where('role_id', 2);
    
        // Filter by search query (name)
        if ($searchQuery) {
            $supervisorsQuery->where('name', 'like', '%' . $searchQuery . '%');
        }
    
        // Filter by school ID through the staff table
        if ($schoolId) {
            $supervisorsQuery->whereHas('staff', function ($query) use ($schoolId) {
                $query->where('school_id', $schoolId);
            });
        }
    
        // Order the supervisors by their names in alphabetical order
        $supervisorsQuery->orderBy('name', 'asc');
    
        // Paginate the results and maintain the query parameters in the pagination links
        $supervisors = $supervisorsQuery->paginate(10)->appends([
            'search' => $searchQuery,
            'school' => $schoolId,
        ]);
    
        // Retrieve all schools to populate the dropdown in the view
        $schools = School::all();
    
        // Return the view with supervisors and schools data
        return view('supervisorallocations.supervisorIndex', [
            'supervisors' => $supervisors,
            'schools' => $schools,
        ]);
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
            'supervisor_type' => 'required|string|in:principal,lead,supervisor',
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
        $allocation->supervisor_type = $request->supervisor_type;
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
            'supervisor_type' => 'required|string|in:principal,lead,supervisor',
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
        $allocation->supervisor_type = $request->supervisor_type;

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

  public function reviewChangeSupervisorRequests(Request $request)
  {
      $searchQuery = $request->input('search');
      $programId = $request->input('program');
  
      // Base query with eager loading
      $changeRequests = ChangeSupervisorRequest::with(['student.user', 'student.program']);
  
      // Apply search filter by student name
      if ($searchQuery) {
          $changeRequests->whereHas('student.user', function ($query) use ($searchQuery) {
              $query->where('name', 'like', '%' . $searchQuery . '%');
          });
      }
  
      // Apply filter by program
      if ($programId) {
          $changeRequests->whereHas('student.program', function ($query) use ($programId) {
              $query->where('id', $programId);
          });
      }

      // Order by student name in ascending order
    $changeRequests->orderBy(function ($query) {
        $query->from('users')
              ->join('students', 'students.user_id', '=', 'users.id')
              ->select('users.name')
              ->whereColumn('students.id', 'change_supervisor_requests.student_id')
              ->limit(1);
    }, 'asc');
  
      // Paginate the results
      $paginatedRequests = $changeRequests->paginate(10)->appends([
          'search' => $searchQuery,
          'program' => $programId,
      ]);
  
      // Get all programs to populate the dropdown
      $programs = Program::all();
  
      return view('supervisorallocations.reviewChangeSupervisorRequests', [
          'paginatedRequests' => $paginatedRequests, // Pass paginated requests to the view
          'programs' => $programs,
      ]);
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