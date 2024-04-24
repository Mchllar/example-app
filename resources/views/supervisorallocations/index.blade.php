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
                                <th class="grey-cell px-4 py-2">Student Name</th>
                                <th class="grey-cell px-4 py-2">Program</th>
                                <th class="grey-cell px-4 py-2">Assign Supervisor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{ $student->user->name }}</td>
                                <td class="border px-4 py-2">{{ $student->program->name }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('allocation', ['student_id' => $student->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Assign</a>
                                </td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th class="grey-cell px-4 py-2">Supervisor</th>
                                <th class="grey-cell px-4 py-2">Start Date</th>
                                <th class="grey-cell px-4 py-2">End Date</th>
                                <th class="grey-cell px-4 py-2">Notes</th>
                                <th class="grey-cell px-4 py-2">Status</th>
                                <th class="grey-cell px-4 py-2">Contract</th>
                                <th class="gre-cell px-4 py-2">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($student->supervisorAllocations()->exists())
                                @foreach($student->supervisorAllocations as $allocation)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $allocation->supervisor->name }}</td>
                                        <td class="border px-4 py-2">{{ $allocation->start_date }}</td>
                                        <td class="border px-4 py-2">{{ $allocation->end_date }}</td>
                                        <td class="border px-4 py-2">{{ $allocation->notes }}</td>
                                        <td class="border px-4 py-2">{{ $allocation->status }}</td>
                                        <td class="border px-4 py-2">
                                            @if($allocation->contract)
                                                <a href="{{ asset($allocation->contract) }}" target="_blank">View Contract</a>
                                            @else
                                                None
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('allocation.edit', ['id' => $allocation->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="border px-4 py-2" colspan="6">No supervisor allocation found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                @endforeach
            @endif
        </div>
    </div>
</x-layout>

<style>
    .grey-cell {
        background-color: #f3f4f6;
    }
</style>
