<x-layout>
    <style>
    a:hover {
        color: red;
    }
    
    .th {
        background-color: #4CAF50;
        color: white;
    }
    
    .table-smaller {
        width: 80%; /* Adjust the width as needed */
    }
    
    </style>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Complete Progress Reports</h1>
        <table class="min-w-full mx-auto table-smaller">
            <thead>
                <tr>
                    <th scope="col" class="th px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Student Name</th>
                    <th scope="col" class="th px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Reporting Period</th>
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
    