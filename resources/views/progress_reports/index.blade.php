<x-layout>
    <style>
        /* CSS to change link color to red when hovered over */
        a:hover {
            color: red;
        }
    </style>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h2 class="text-lg font-bold mb-4 text-center">Progress Report Index</h2>
        <p class="text-lg font-bold mb-4 text-center">Welcome, please fill in your progress report for the respective time period</p>
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border border-gray-200 bg-gray-200">Progress Report</th>
                    <th class="px-4 py-2 border border-gray-200 bg-gray-200">Reporting Period</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportingPeriods as $period)
                <tr>
                    <td class="px-4 py-2 border border-gray-200">
                        <a href="{{ route('progress_reports.sectionA', ['period_id' => $period->id]) }}">Progress Report {{ $period->name }}</a>
                    </td>
                    <td class="px-4 py-2 border border-gray-200">{{ $period->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
