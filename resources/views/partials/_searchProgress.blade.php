<form method="GET" action="{{ route('progress_reports.completeReport') }}" class="absolute top-4 right-4 z-50">
    <div class="relative border-2 border-gray-100 rounded-lg">
        <!-- Search by Student Name -->
        <div class="absolute top-4 left-3">
            <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
        </div>
        <input type="text" name="search_term" id="search_term" value="{{ request('search_term') }}" 
               class="h-14 w-60 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" 
               placeholder="Search by Student Name" />

        <!-- Filter by Reporting Period -->
        <select name="reporting_period" id="reporting_period" class="h-14 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none">
            <option value="">Select Reporting Period</option>
            @foreach($reportingPeriods as $period)
                <option value="{{ $period->id }}" {{ request('reporting_period') == $period->id ? 'selected' : '' }}>
                    {{ $period->name }}
                </option>
            @endforeach
        </select>

        <!-- Search Button -->
        <div class="absolute top-2 right-2">
            <button type="submit" class="h-10 w-20 text-white rounded-lg bg-green-500 hover:bg-blue-600">Search</button>
        </div>
    </div>
</form>