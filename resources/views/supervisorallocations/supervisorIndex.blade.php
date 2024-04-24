<x-layout>
    @include('partials._searchtwo')
    <div class="flex justify-center items-center h-full">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-8">List of Supervisors</h1>
            @if($supervisors->isEmpty())
                <p>No supervisors found.</p>
            @else
                @foreach($supervisors as $supervisor)
                    <table class="table-auto w-full mb-4">
                        <thead>
                            <tr>
                                <th class="grey-cell px-4 py-2">Supervisor Name</th>
                                <th class="grey-cell px-4 py-2">School</th>
                                <th class="grey-cell px-4 py-2">Assign Student</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{ $supervisor->name }}</td>
                                <td class="border px-4 py-2">{{ $supervisor->staff->school->name }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('allocationStudent', ['supervisor_id' => $supervisor->id, 'supervisor_name' => urlencode($supervisor->name)]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Assign</a>
                                </td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th class="grey-cell px-4 py-2">Student</th>
                                <th class="grey-cell px-4 py-2">Start Date</th>
                                <th class="grey-cell px-4 py-2">End Date</th>
                                <th class="grey-cell px-4 py-2">Notes</th>
                                <th class="grey-cell px-4 py-2">Status</th>
                                <th class="grey-cell px-4 py-2">Contract</th>
                                <th class="grey-cell px-4 py-2">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($supervisor->supervisorAllocations()->exists())
                                @foreach($supervisor->supervisorAllocations as $allocation)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $allocation->student->user->name }}</td>
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
                                    <td class="border px-4 py-2" colspan="6">No student allocation found.</td>
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