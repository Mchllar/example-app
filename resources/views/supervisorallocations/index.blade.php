<x-layout>
    @include('partials._search')
    <div class="flex justify-center items-center h-full">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-8">List of Students</h1>
            @if($students->isEmpty())
                <p>No students found.</p>
            @else
                @foreach($students as $student)
                    <table class="table-auto w-full mb-4">
                        <thead>
                            <tr>
                                <th>Student No.</th>
                                <th>Student Name</th>
                                <th>Program</th>
                                <th>Assign Supervisor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{ $student->student_number }}</td>
                                <td class="border px-4 py-2">{{ $student->user->name }}</td>
                                <td class="border px-4 py-2">{{ $student->program->name }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('allocation', ['student_id' => $student->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Assign</a>
                                </td>
                            </tr>
                        </tbody>
                        <tbody class="hidden" id="allocation-{{ $student->id }}">
                            <tr>
                                <th>Supervisor Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Notes</th>
                                <th>Contract</th>
                                <th>Supervisor Type</th>
                                <th>Edit</th>
                            </tr>
                            @if($student->supervisorAllocations()->exists())
                                @foreach($student->supervisorAllocations as $allocation)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $allocation->supervisor->name }} ({{ $allocation->status }})</td>
                                        <td class="border px-4 py-2">{{ $allocation->start_date }}</td>
                                        <td class="border px-4 py-2">{{ $allocation->end_date }}</td>
                                        <td class="border px-4 py-2">{{ $allocation->notes }}</td>
                                        <td class="border px-4 py-2">
                                            @if($allocation->contract)
                                                <a href="{{ asset('storage/' . $allocation->contract) }}" target="_blank">View Contract</a>
                                            @else
                                                None
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">{{ $allocation->supervisor_type }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('allocation.edit', ['id' => $allocation->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="border px-4 py-2" colspan="7">No supervisor allocation found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <button onclick="toggleAllocation({{ $student->id }})" class="text-blue-500">View Supervisors</button>
                @endforeach

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $students->links() }}
                </div>

            @endif
        </div>
    </div>
</x-layout>

<style>
    .grey-cell {
        background-color: #f3f4f6;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
</style>

<script>
    function toggleAllocation(studentId) {
        var allocationTable = document.getElementById("allocation-" + studentId);
        allocationTable.classList.toggle("hidden");
    }
</script>
