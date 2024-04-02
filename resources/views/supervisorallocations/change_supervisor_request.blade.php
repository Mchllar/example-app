<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Change Supervisor Request Form</h1>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('change-supervisor-request') }}" method="POST">
                @csrf

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

                <!-- Approval by School -->
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div><br>

                <!-- Approval by Board -->
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div><br>

                <!-- Director Date -->
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div><br>
            </form>
        </div>
    </div>
</x-layout>
