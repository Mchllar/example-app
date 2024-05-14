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
        <h1 class="text-2xl font-bold mb-4">Update Progress Reports</h1>
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
                {{-- Check if the progress report is associated with a supervisor --}}
                @if ($report->student->supervisorAllocations->contains('supervisor_id', auth()->user()->id))
                    <tr>
                        <td class="border px-4 py-2">
                            <a href="{{ route('progress_reports.sectionC', ['studentId' => $report->student->id, 'reportingPeriod' => $report->reportingPeriod->id]) }}">
                                {{ $report->student->user->name }}
                            </a>
                        </td>
                        <td class="border px-4 py-2">{{ $report->reportingPeriod->name }}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
    </x-layout>
    