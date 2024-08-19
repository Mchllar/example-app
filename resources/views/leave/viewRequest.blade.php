<style>
    .th{
        background-color:#4CAF50;
        color: white;
    }
</style>

<x-layout>
    <!-- Include search and filter form -->
    @include('partials._searchRequest')

    <div class="centered">
        <div class="max-w-4xl mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-4">Academic Leave Requests by Students</h1>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <!--<th scope="col" class="th px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">No. of requests</th>-->
                            <th scope="col" class="th px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Student Name</th>
                            <th scope="col" class="th px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Program</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($students as $student)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap"><a href="{{ route('academic_leave.approve', ['student_id' => $student->id]) }}" class="text-blue-500 hover:underline">{{ $student->student_name }}</a></td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->program_name }}</td>
                        </tr>
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
