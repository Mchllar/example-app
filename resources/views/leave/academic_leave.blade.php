<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Academic Leave Request Form</h1>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('academic_leave.store') }}" method="POST">
                @csrf

                <!-- Student Information -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="student_number" class="block text-gray-700 text-sm font-bold mb-2">Student Number</label>
                    <input type="text" id="student_number" name="student_number" value="{{ old('student_number', auth()->user()->student->student_number ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="tel" class="block text-gray-700 text-sm font-bold mb-2">Phone No.</label>
                    <input type="tel" id="tel" name="tel" value="{{ old('tel', auth()->user()->phone_number) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <!-- Dates -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">To proceed on Academic Leave from:</label>
                    <div class="flex">
                        <input type="date" id="leave_date" name="leave_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="reason_for_leave" class="block text-gray-700 text-sm font-bold mb-2">Reason for taking Academic Leave</label>
                    
                    <div class="mb-2">
                        <input type="radio" id="work_constraints" name="reason" value="Work Constraints">
                        <label for="work_constraints" class="ml-2">Work Constraints</label>
                    </div>
                    
                    <div class="mb-2">
                        <input type="radio" id="health_issues" name="reason" value="Health Issues">
                        <label for="health_issues" class="ml-2">Health Issues</label>
                    </div>
                    
                    <div class="mb-2">
                        <input type="radio" id="family_emergency" name="reason" value="Family Emergency">
                        <label for="family_emergency" class="ml-2">Family Emergency</label>
                    </div>
                    
                    <div class="mb-2">
                        <input type="radio" id="personal_development" name="reason" value="Personal Development">
                        <label for="personal_development" class="ml-2">Personal Development</label>
                    </div>
                    <!-- Add more reasons as needed -->
                    <div class="mb-4">
                        <label for="other" class="block text-gray-700 text-sm font-bold mb-2">Other Reasons</label>
                        <input type="text" id="other" name="other" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                </div>
                
                

                <!-- Expected Date of Return -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Expected Date of Return from Academic Leave</label>
                    <div class="flex">
                        <input type="date" id="return_date" name="return_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>         

                <!-- Submit Button -->
                <div class="flex items-center justify-between mt-8">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
