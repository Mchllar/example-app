<x-layout>
    <style>
        /* Custom CSS to style sections in green color */
        .section-heading {
            color: green;
        }

        /* Custom CSS for form container */
        .form-container {
            background-color: #f3f4f6; /* Grey background */
            padding: 20px; /* Add padding for better visual appearance */
        }
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Make the container at least as tall as the viewport */
        }
    </style>
    <!-- Academic Leave Request Form -->
    <div class="centered">
        <div class="form-container max-w-lg mx-auto px-4 py-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-4 text-center">Academic Leave Request Form</h1>
            <form method="POST">
                @csrf
                <!-- Student Information -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $academicLeaveRequest->student->user->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required readonly>
                </div>
                <div class="mb-4">
                    <label for="student_number" class="block text-gray-700 text-sm font-bold mb-2">Student Number</label>
                    <input type="text" id="student_number" name="student_number" value="{{ old('student_number', $academicLeaveRequest->student->student_number) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required readonly>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $academicLeaveRequest->student->user->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required readonly>
                </div>
                <div class="mb-4">
                    <label for="tel" class="block text-gray-700 text-sm font-bold mb-2">Phone No.</label>
                    <input type="tel" id="tel" name="tel" value="{{ old('tel', $academicLeaveRequest->student->user->phone_number) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required readonly>
                </div>

                <!-- Dates -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">To proceed on Academic Leave from:</label>
                    <div class="flex">
                        <input type="date" id="leave_date" name="leave_date" value="{{ $academicLeaveRequest->leave_start_date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required readonly>
                    </div>
                </div>

                <!-- Reason for Leave -->
                <div class="mb-4">
                    <label for="reason_for_leave" class="block text-gray-700 text-sm font-bold mb-2">Reason for taking Academic Leave</label>
                    <input type="text" id="reason_for_leave" name="reason_for_leave" value="{{ $academicLeaveRequest->reason_for_leave }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required readonly>
                </div>

                <!-- Expected Date of Return -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Expected Date of Return from Academic Leave</label>
                    <div class="flex">
                        <input type="date" id="return_date" name="return_date" value="{{ $academicLeaveRequest->return_date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>

                 @php
                    $userRole = auth()->user()->role->name ?? null;
                 @endphp
              
                 @if($userRole === 'supervisor')
                  <!--Supervisor-->
                  <div class="centered">
                      <div class="form-container max-w-lg mx-auto px-4 py-8 rounded-lg shadow-md">
                      <form method="POST" action="{{ route('academic_leave.storeApprove', $academicLeaveRequest->id) }}" class="mr-4">
                          @csrf
                          <input type="hidden" name="academic_leave_request_id" value="{{ $academicLeaveRequest->id }}">
                          <div class="mb-4">
                               <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Supervisor Name</label>
                               <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                               <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                          </div>
              
              
                             <div class="mb-4">
                                  <label class="block text-gray-700 text-sm font-bold mb-2">Date of Approval</label>
                                  <input type="date" id="ogs_approval_date" name="ogs_approval_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                             </div>
              
                             <div class="mb-4">
                              <label for="status"><strong>Approval</strong></label><br>
                                      <select id="status" name="status" class="form-select border border-gray-200 rounded p-2">
                                          <option value="Approved">Approve</option>
                                          <option value="Declined">Deny</option>
                                      </select>
                             </div>
                          <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Finish</button>
                      </form>
                  </div>
                  </div>
              
                  @elseif($userRole === 'School Dean')
                  <div class="centered">
                      <div class="form-container max-w-lg mx-auto px-4 py-8 rounded-lg shadow-md">
                      <form method="POST" action="{{ route('academic_leave.facultyApprove', $academicLeaveRequest->id) }}" class="mr-4">
                          @csrf
                          <input type="hidden" name="academic_leave_request_id" value="{{ $academicLeaveRequest->id }}">
                          <div class="mb-4">
                               <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name of Director of Faculty Dean</label>
                               <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                               <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                          </div>
              
              
                             <div class="mb-4">
                                  <label class="block text-gray-700 text-sm font-bold mb-2">Date of Approval</label>
                                  <input type="date" id="ogs_approval_date" name="ogs_approval_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                             </div>
              
                             <div class="mb-4">
                              <label for="status"><strong>Approval</strong></label><br>
                                      <select id="status" name="status" class="form-select border border-gray-200 rounded p-2">
                                        <option value="Approved">Approve</option>
                                        <option value="Declined">Deny</option>
                                      </select>
                             </div>
                          <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Finish</button>
                      </form>
                  </div>
                  </div>
               @elseif($userRole === 'staff')
                      <div class="centered">
                      <div class="form-container max-w-lg mx-auto px-4 py-8 rounded-lg shadow-md">
                      <form method="POST" action="{{ route('academic_leave.ogsApprove', $academicLeaveRequest->id) }}" class="mr-4">
                          @csrf
                          <input type="hidden" name="academic_leave_request_id" value="{{ $academicLeaveRequest->id }}">
                          <div class="mb-4">
                               <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name of OGS Staff</label>
                               <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                               <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                          </div>
              
              
                             <div class="mb-4">
                                  <label class="block text-gray-700 text-sm font-bold mb-2">Date of Approval</label>
                                  <input type="date" id="ogs_approval_date" name="ogs_approval_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                             </div>
              
                             <div class="mb-4">
                              <label for="status"><strong>Approval</strong></label><br>
                                      <select id="status" name="status" class="form-select border border-gray-200 rounded p-2">
                                        <option value="Approved">Approve</option>
                                        <option value="Declined">Deny</option>
                                      </select>
                             </div>
                          <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Finish</button>
                      </form>
                  </div>
                  </div>
                  @elseif($userRole === 'Registrar')
                      <div class="centered">
                      <div class="form-container max-w-lg mx-auto px-4 py-8 rounded-lg shadow-md">
                      <form method="POST" action="{{ route('academic_leave.registrarApprove', $academicLeaveRequest->id) }}" class="mr-4">
                          @csrf
                          <input type="hidden" name="academic_leave_request_id" value="{{ $academicLeaveRequest->id }}">
                          <div class="mb-4">
                               <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name of Registrar</label>
                               <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                               <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                          </div>
              
              
                             <div class="mb-4">
                                  <label class="block text-gray-700 text-sm font-bold mb-2">Date of Approval</label>
                                  <input type="date" id="ogs_approval_date" name="ogs_approval_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                             </div>
              
                             <div class="mb-4">
                              <label for="status"><strong>Approval</strong></label><br>
                                      <select id="status" name="status" class="form-select border border-gray-200 rounded p-2">
                                        <option value="Approved">Approve</option>
                                        <option value="Declined">Deny</option>
                                      </select>
                             </div>
                          <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Finish</button>
                      </form>
                  </div>
                  </div>
                  @endif
    
</x-layout>
