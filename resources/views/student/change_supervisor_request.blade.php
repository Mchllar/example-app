<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Change Supervisor Request Form</h1>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('change-supervisor-request') }}" method="POST">
                @csrf

                <!-- Student Name -->
                <div class="mb-4">
                    <label for="student_name" class="block text-gray-700 text-sm font-bold mb-2">Student Name</label>
                    <input id="student_name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="student_name" value="{{ Auth::user()->name }}" readonly>
                </div>

                <!-- Student Number -->
                <div class="mb-4">
                    <label for="student_number" class="block text-gray-700 text-sm font-bold mb-2">Student No</label>
                    <input id="student_number" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="student_number" value="{{ Auth::user()->student->student_number }}" readonly>
                </div>
                
                <!-- School/Institute -->
                <div class="mb-4">
                    <label for="school" class="block text-gray-700 text-sm font-bold mb-2">School/Institute enrolled in</label>
                    <input id="school" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('school') border-red-500 @enderror" name="school" value="{{ Auth::user()->school }}" required autocomplete="school">
                    @error('school')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title of Thesis -->
                <div class="mb-4">
                    <label for="thesis_title" class="block text-gray-700 text-sm font-bold mb-2">Title of Thesis</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="thesis_title" name="thesis_title" required>
                </div>

                <!-- Current Supervisors -->
                <hr class="mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Current Supervisors</label>
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="current_supervisor_1" class="block text-gray-700 text-sm font-bold mb-2">1st Supervisor</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="current_supervisor_1" name="current_supervisor_1">
                        </div>
                        <div>
                            <label for="current_supervisor_2" class="block text-gray-700 text-sm font-bold mb-2">2nd Supervisor</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="current_supervisor_2" name="current_supervisor_2">
                        </div>
                        <div>
                            <label for="current_supervisor_3" class="block text-gray-700 text-sm font-bold mb-2">3rd Supervisor</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="current_supervisor_3" name="current_supervisor_3">
                        </div>
                    </div>
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

                <!-- Approval by School -->
                <div class="mb-4">
                    <label for="approval_date_school" class="block text-gray-700 text-sm font-bold mb-2">Approved by School Graduate Studies Committee</label>
                    <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="approval_date_school" name="approval_date_school">
                </div>

                <!-- Signature -->
                <div class="mb-4">
                    <label for="signature_school" class="block text-gray-700 text-sm font-bold mb-2">Signature</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="signature_school" name="signature_school">
                </div>

                <!-- Name -->
                <div class="mb-4">
                    <label for="name_school" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name_school" name="name_school">
                </div>

                <!-- Approval by Board -->
                <div class="mb-4">
                    <label for="approval_date_board" class="block text-gray-700 text-sm font-bold mb-2">Approved by Board of Graduate Studies Meeting of (Date)</label>
                    <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="approval_date_board" name="approval_date_board">
                </div>

                <!-- Director Name -->
                <div class="mb-4">
                    <label for="director_name" class="block text-gray-700 text-sm font-bold mb-2">Signed (Director of Graduate Studies) Name</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="director_name" name="director_name">
                </div>

                <!-- Director Date -->
                <div class="mb-4">
                    <label for="director_date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                    <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="director_date" name="director_date">
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
