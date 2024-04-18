<x-layout>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Progress Reports</h1>
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Student Name</th>
                    <th class="px-4 py-2">Reporting Period</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($progressReports as $report)
                <tr>
                    <td class="border px-4 py-2">
                        <!-- Make the student's name a link -->
                        <a href="{{ route('progress_reports.sectionC', ['studentId' => $report->student->id, 'reportingPeriod' => $report->reportingPeriod->id]) }}">
                            {{ $report->student->user->name }}
                        </a>
                    </td>
                    <td class="border px-4 py-2">{{ $report->reportingPeriod->name }}</td>
                    <!-- Populate other table cells with respective data -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
