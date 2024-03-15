<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Academic Leave Request Form</h1>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('academic-leave-request') }}" method="POST">
                @csrf

                <!-- Student Information -->
                <div class="mb-4">
                    <label for="surname" class="block text-gray-700 text-sm font-bold mb-2">Surname</label>
                    <input type="text" id="surname" name="surname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="other_names" class="block text-gray-700 text-sm font-bold mb-2">Other Names</label>
                    <input type="text" id="other_names" name="other_names" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="student_number" class="block text-gray-700 text-sm font-bold mb-2">Student Number</label>
                    <input type="text" id="student_number" name="student_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                    <input type="text" id="address" name="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="tel" class="block text-gray-700 text-sm font-bold mb-2">Phone No.</label>
                    <input type="tel" id="tel" name="tel" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <!-- Dates -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">To proceed on Academic Leave from:</label>
                    <div class="flex">
                        <input type="date" id="leave_date" name="leave_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <input type="text" id="leave_month" name="leave_month" class="shadow appearance-none border rounded ml-4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Month" required>
                        <input type="text" id="leave_year" name="leave_year" class="shadow appearance-none border rounded ml-4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Year" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="reason_for_leave" class="block text-gray-700 text-sm font-bold mb-2">Reason for taking Academic Leave</label>
                    <div class="mb-2">
                        <input type="checkbox" id="work_constraints" name="reason[]" value="Work Constraints">
                        <label for="work_constraints" class="ml-2">Work Constraints</label>
                    </div>
                    <!-- Add other reasons as checkboxes -->
                </div>

                <!-- Expected Date of Return -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Expected Date of Return from Academic Leave</label>
                    <div class="flex">
                        <input type="date" id="return_date" name="return_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>

                <!-- Signatures and Dates -->
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label for="student_signature" class="block text-gray-700 text-sm font-bold mb-2">Student Signature:</label>
                        <input type="text" id="student_signature" name="student_signature" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div>
                        <label for="student_date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                        <input type="date" id="student_date" name="student_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <!-- Add fields for supervisor and dean -->
                </div>

                <!-- Office Signatures and Dates -->
                <div class="grid grid-cols-3 gap-4 mt-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Received: Office of Graduate Studies</label>
                        <input type="text" id="ogs_signature" name="ogs_signature" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <input type="date" id="ogs_date" name="ogs_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <!-- Add more signature and date fields -->
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between mt-8">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
