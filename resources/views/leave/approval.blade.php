<x-layout>
    <!-- Academic Leave Request Form -->
    <div class="centered">
        <div class="form-container max-w-lg mx-auto px-4 py-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-4 text-center">Academic Leave Request Form</h1>
            <form method="POST" action="{{ route('academic_leave.storeApprove') }}">
                @csrf

                <!-- Student Information -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $academicLeaveRequest->student->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required readonly>
                </div>
                <div class="mb-4">
                    <label for="student_number" class="block text-gray-700 text-sm font-bold mb-2">Student Number</label>
                    <input type="text" id="student_number" name="student_number" value="{{ old('student_number', $academicLeaveRequest->student->student_number) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required readonly>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $academicLeaveRequest->student->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required readonly>
                </div>
                <div class="mb-4">
                    <label for="tel" class="block text-gray-700 text-sm font-bold mb-2">Phone No.</label>
                    <input type="tel" id="tel" name="tel" value="{{ old('tel', $academicLeaveRequest->student->phone_number) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required readonly>
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

                <!-- Approval Buttons -->
                <div class="flex items-center justify-center mt-8">
                    <form method="POST" action="{{ route('approve_leave', $academicLeaveRequest->id) }}" class="mr-4">
                        @csrf
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Approve</button>
                    </form>
                    <form method="POST" action="{{ route('deny_leave', $academicLeaveRequest->id) }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Deny</button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</x-layout>
