<x-layout>
    <div class="max-w-3xl mx-auto mt-8 px-4">
        <!-- Table to display student information -->
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-200">Student Name</th>
                    <th class="px-4 py-2 bg-gray-200">Country</th>
                    <th class="px-4 py-2 bg-gray-200">Religion</th>
                    <th class="px-4 py-2 bg-gray-200">Gender</th>
                    <th class="px-4 py-2 bg-gray-200">Program</th>
                    <th class="px-4 py-2 bg-gray-200">Supervisor</th>
                    <th class="px-4 py-2 bg-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td class="border px-4 py-2">{{ $student->user->name }}</td>
                        <td class="border px-4 py-2">{{ $student->user->country->country_name }}</td>
                        <td class="border px-4 py-2">{{ $student->user->religion->name }}</td>
                        <td class="border px-4 py-2">{{ $student->user->gender->name }}</td>
                        <td class="border px-4 py-2">{{ $student->program->name }}</td>
                        <td class="border px-4 py-2">
                            @if ($student->supervisorAllocation)
                                {{ $student->supervisorAllocation->supervisor->name }}
                            @else
                                Not Assigned
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            @if (!$student->supervisorAllocation)
                                <!-- Add your assign supervisor form here -->
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
