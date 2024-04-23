<!-- resources/views/reviewChangeSupervisorRequests.blade.php -->

<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Review Change Supervisor Requests</h1>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">No. of requests</th>
                        <th class="border px-4 py-2">Student Name</th>
                        <th class="border px-4 py-2">Program</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupedRequests as $studentId => $requests)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('viewStudentForm', ['studentId' => $studentId]) }}" class="text-blue-500 hover:underline">
                                {{ $requests->first()->student->user->name }}
                            </a>
                        </td>
                        <td class="border px-4 py-2">{{ $requests->first()->student->program->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
