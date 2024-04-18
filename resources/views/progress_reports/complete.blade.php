<x-layout>
    <style>
        a:hover {
            color: red;
        }
    </style>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Complete Progress Reports</h1>
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
                        <a href="{{ route('progress_reports.sectionD', ['studentId' => $report->student->id, 'reportingPeriod' => $report->reportingPeriod->id]) }}">
                            {{ $report->student->user->name }}
                        </a>
                    </td>
                    <td class="border px-4 py-2">{{ $report->reportingPeriod->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
