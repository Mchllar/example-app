<x-layout>
    @include('partials._searchProgress')
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
                    <th scope="col" class="th px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($progressReports as $report)
                    @if(!session()->has('cleared_report_' . $report->id))
                    <tr>
                        <td class="border px-4 py-2">
                            <a href="{{ route('progress_reports.sectionD', ['studentId' => $report->student->id, 'reportingPeriod' => $report->reportingPeriod->id]) }}">
                                {{ $report->student->user->name }}
                            </a>
                        </td>
                        <td class="border px-4 py-2">{{ $report->reportingPeriod->name }}</td>
                        <td class="border px-4 py-2">
                            @if($report->dir_progress_satisfaction)
                                <a href="{{ route('progress_reports.clearStatus', $report->id) }}">Complete (Clear)</a>
                            @else
                                Incomplete
                            @endif
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
