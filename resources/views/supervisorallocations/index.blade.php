<x-layout>
    <div class="flex justify-center items-center h-full">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-8">List of Students</h1>
            @if($students->isEmpty())
                <p>No students found.</p>
            @else
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Start Date</th>
                            <th class="px-4 py-2">End Date</th>
                            <th class="px-4 py-2">Notes</th>
                            <th class="px-4 py-2">Contract</th>
                            <th class="px-4 py-2">Supervisor</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td class="border px-4 py-2">{{ $student->user->name }}</td>
                                @if($student->supervisorAllocation)
                                    <td class="border px-4 py-2">{{ $student->supervisorAllocation->start_date }}</td>
                                    <td class="border px-4 py-2">{{ $student->supervisorAllocation->end_date }}</td>
                                    <td class="border px-4 py-2">{{ $student->supervisorAllocation->notes }}</td>
                                    <td class="border px-4 py-2">
                                        @if($student->supervisorAllocation->contract)
                                            <a href="{{ asset($student->supervisorAllocation->contract) }}" target="_blank">View Contract</a>
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">
                                        @if($student->supervisorAllocation)
                                            @if($student->supervisorAllocation->supervisor)
                                                {{ $student->supervisorAllocation->supervisor->name }}
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('allocation', ['student_id' => $student->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Assign New Supervisor</a>
                                    </td>
                                @else
                                    <td class="border px-4 py-2">None</td>
                                    <td class="border px-4 py-2">None</td>
                                    <td class="border px-4 py-2">None</td>
                                    <td class="border px-4 py-2">None</td>
                                    <td class="border px-4 py-2">None</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('allocation', ['student_id' => $student->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Assign New Supervisor</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-layout>
