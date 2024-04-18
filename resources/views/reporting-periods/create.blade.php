<x-layout>
    <style>
 
        .form-container {
            background-color: #f3f4f6; /* Grey background */
            padding: 20px; /* Add padding for better visual appearance */
        }
    </style>
    <div class="flex justify-center items-center flex-col">
        <h1 class="text-3xl font-bold mb-4">Add Reporting Period</h1>

        <form method="post" action="{{ route('reporting-periods.store') }}" class="form-container max-w-3xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" id="name" name="name" class="border border-gray-300 rounded p-2 w-full" placeholder="Jan-June" required>
            </div>
            <div class="mb-4">
                <label for="year" class="block text-gray-700">Year:</label>
                <input type="text" id="year" name="year" class="border border-gray-300 rounded p-2 w-full" placeholder="2024" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status:</label>
                <select id="status" name="status" class="border border-gray-300 rounded p-2 w-full">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-layout>
