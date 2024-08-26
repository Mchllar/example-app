<x-layout>
    @include('partials._searchProgressUpdate')

    <style>
        a:hover {
            color: red;
        }

        .th {
            background-color: #4CAF50;
            color: white;
        }

        .table-smaller {
            width: 80%;
        }
    </style>

    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Update Progress Reports</h1>
        <table class="min-w-full mx-auto table-smaller">
            <thead>
                <tr>
                    <th scope="col" class="th px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Student No.</th>
                    <th scope="col" class="th px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Student Name</th>
                    <th scope="col" class="th px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Reporting Period</th>
                </tr>
            </thead>
            <tbody>
                @foreach($progressReports as $report)
                    @if ($report->student->supervisorAllocations->contains('supervisor_id', auth()->user()->id))
                        <tr>
                            <td class="border px-4 py-2">{{ $report->student->student_number }}</td>
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
        
        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $progressReports->links() }}
        </div>
    </div>
</x-layout>
