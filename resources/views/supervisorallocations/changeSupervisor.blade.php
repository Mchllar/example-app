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
    <div class="centered">
        <div class="form-container max-w-lg mx-auto px-4 py-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4 text-center">Change Supervisor Request Form</h1>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('changeSupervisor.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="student_number" class="block text-gray-700 text-sm font-bold mb-2">Student Number</label>
                    <input type="text" id="student_number" name="student_number" value="{{ old('student_number', auth()->user()->student->student_number ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <input type="hidden" id="student_id" name="student_id" value="{{ auth()->user()->student->id }}">
                </div>

                <!-- Title of Thesis -->
                <div class="mb-4">
                    <label for="thesis_title" class="block text-gray-700 text-sm font-bold mb-2">Title of Thesis</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="thesis_title" name="thesis_title" required>
                </div>


                <!-- Proposed Supervisors -->
                <hr class="mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Proposed Supervisors</label>
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="proposed_supervisor_1" class="block text-gray-700 text-sm font-bold mb-2">1st Supervisor</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="proposed_supervisor_1" name="proposed_supervisor_1">
                        </div>
                        <div>
                            <label for="proposed_supervisor_2" class="block text-gray-700 text-sm font-bold mb-2">2nd Supervisor</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="proposed_supervisor_2" name="proposed_supervisor_2">
                        </div>
                        <div>
                            <label for="proposed_supervisor_3" class="block text-gray-700 text-sm font-bold mb-2">3rd Supervisor</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="proposed_supervisor_3" name="proposed_supervisor_3">
                        </div>
                    </div>
                </div>

                <!-- Effective Date -->
                <div class="mb-4">
                    <label for="effective_date" class="block text-gray-700 text-sm font-bold mb-2">Changes to be effective from Date</label>
                    <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="effective_date" name="effective_date" required>
                </div>

                <!-- Reason for Change -->
                <div class="mb-4">
                    <label for="reason_for_change" class="block text-gray-700 text-sm font-bold mb-2">Reason(s) for proposed change</label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="reason_for_change" name="reason_for_change" rows="3" required></textarea>
                </div>


                <!-- Submit Button -->
                <div class="flex items-center justify-center mt-8">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
                
            </form>
        </div>
    </div>
    </div>
</x-layout>
