<!-- resources/views/reviewChangeSupervisorRequests.blade.php -->
<style>
    .th {
        background-color: #4CAF50;
        color: white;
    }
</style>
<x-layout>
    @include('partials._searchReview')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Review Change Supervisor Requests</h1>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="th border px-4 py-2">No. of requests</th>
                        <th class="th border px-4 py-2">Student Number</th>
                        <th class="th border px-4 py-2">Student Name</th>
                        <th class="th border px-4 py-2">Program</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paginatedRequests as $request)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $request->student->student_number }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('viewStudentForm', ['studentId' => $request->student_id]) }}" class="text-blue-500 hover:underline">
                                {{ $request->student->user->name }}
                            </a>
                        </td>
                        <td class="border px-4 py-2">{{ $request->student->program->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination links -->
            <div class="mt-4">
                {{ $paginatedRequests->links() }}
            </div>
        </div>
    </div>
</x-layout>