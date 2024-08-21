<style>
    .th {
        background-color: #4CAF50;
        color: white;
        border: 1px solid #ddd; /* Add borders to header */
    }
    table {
        border-collapse: collapse; /* Ensure borders are not doubled */
        width: 100%;
    }
    th, td {
        border: 1px solid #ddd; /* Add borders to cells */
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2; /* Add background color to even rows */
    }
    tr:hover {
        background-color: #ddd; /* Add hover effect */
    }
</style>

<x-layout>
    <!-- Include search and filter form -->
    @include('partials._searchRequest')

    <div class="centered">
        <div class="max-w-4xl mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-4">Academic Leave Requests by Students</h1>
            
            <div class="overflow-x-auto">
                <table>
                    <thead>
                        <tr>
                            <th scope="col" class="th">Student Name</th>
                            <th scope="col" class="th">Program</th>
                            <th scope="col" class="th">Supervisor Approval</th>
                            <th scope="col" class="th">Faculty Approval</th>
                            <th scope="col" class="th">OGS Approval</th>
                            <th scope="col" class="th">Registrar Approval</th>
                            <th scope="col" class="th">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        @if (!session()->has('cleared_students') || !in_array($student->id, session('cleared_students')))
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('academic_leave.approve', ['student_id' => $student->id]) }}" class="text-blue-500 hover:underline">{{ $student->student_name }}</a>
                            </td>
                            <td>{{ $student->program_name }}</td>
                            <td>{{ $student->supervisor_approval_status }}</td>
                            <td>{{ $student->faculty_approval_status }}</td>
                            <td>{{ $student->ogs_approval_status }}</td>
                            <td>{{ $student->registrar_approval_status }}</td>
                            <td>
                                    <form action="{{ route('academic_leave.clearStatus', $student->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-500 hover:underline">Clear</button>
                                   </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</x-layout>
