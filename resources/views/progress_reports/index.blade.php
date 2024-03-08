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
                <tr>
                    <td class="px-4 py-2 border border-gray-200">
                        <a href="{{ route('progress_reports.create', ['period' => 'jan-june-current-year']) }}">Progress Report Jan-Jun Current Year</a>
                    </td>
                    <td class="px-4 py-2 border border-gray-200">Jan - Jun Current Year</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border border-gray-200">
                        <a href="{{ route('progress_reports.create', ['period' => 'july-dec-current-year']) }}">Progress Report July-Dec Current Year</a>
                    </td>
                    <td class="px-4 py-2 border border-gray-200">July - Dec Current Year</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border border-gray-200">
                        <a href="{{ route('progress_reports.create', ['period' => 'jan-june-next-year']) }}">Progress Report Jan-Jun Next Year</a>
                    </td>
                    <td class="px-4 py-2 border border-gray-200">Jan - Jun Next Year</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border border-gray-200">
                        <a href="{{ route('progress_reports.create', ['period' => 'july-dec-next-year']) }}">Progress Report July-Dec Next Year</a>
                    </td>
                    <td class="px-4 py-2 border border-gray-200">July - Dec Next Year</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-layout>
