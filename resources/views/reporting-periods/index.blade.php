<style>
    .th{
        background-color:#4CAF50;
        color: white;
    }
</style>
<x-layout>
    <div class="flex justify-center items-center flex-col">
        <h1 class="text-3xl font-bold mb-4">Reporting Periods</h1>


        <table class="border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th class="th border border-gray-400 px-4 py-2">Name</th>
                    <th class="th border border-gray-400 px-4 py-2">Year</th>
                    <th class="th border border-gray-400 px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportingPeriods as $reportingPeriod)
                <tr>
                    <td class="border border-gray-400 px-4 py-2">{{ $reportingPeriod->name }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $reportingPeriod->year }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $reportingPeriod->status }}</td>
                    <!--<td class="border border-gray-400 px-4 py-2"><form action="{{ route('reporting-periods.destroy', $reportingPeriod->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form></td>-->
                </tr>
                @endforeach
            </tbody>
        </table><br>
        <a href="{{ route('reporting-periods.create') }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mb-4">Add Reporting Period</a>
    </div>
</x-layout>
