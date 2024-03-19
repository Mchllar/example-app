<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Assign Supervisors to Students</h1>

        <table class="mx-auto table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2 font-bold">Name</th>
                    <th class="border border-gray-300 p-2 font-bold">Profile</th>
                    <th class="border border-gray-300 p-2 font-bold">Program</th>
                    <th class="border border-gray-300 p-2 font-bold">Assigned Supervisor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr class="border border-gray-300">
                    <td class="border border-gray-300 p-2">{{ $student->name }}</td>
                    <td class="border border-gray-300 p-2">
                        <img src="{{ asset($student->profile) }}" alt="{{ $student->user_id->name }}'s profile" class="w-16 h-16 object-cover rounded-full">
                    </td>
                    <td class="border border-gray-300 p-2">{{ $student->programme }}</td>
                    <td class="border border-gray-300 p-2">
                        <form action="{{ route('assign-supervisors', $student->id) }}" method="POST">
                            @csrf
                            <select name="supervisor_id" class="p-2 border border-gray-300 rounded">
                                @foreach($supervisors as $supervisor)
                                    <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Assign Supervisor
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>