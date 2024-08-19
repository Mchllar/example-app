<form action="{{ route('supervisorAllocation') }}" method="GET" class="absolute top-4 right-4 z-50">
    <div class="relative border-2 border-gray-100 rounded-lg">
        <div class="absolute top-4 left-3">
            <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
        </div>
        <input type="text" name="search" class="h-14 w-60 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search by Name" value="{{ request('search') }}" />
        
        <!-- Program Dropdown -->
        <select name="program" class="h-14 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none">
            <option value="">All Programs</option>
            @foreach($programs as $program)
                <option value="{{ $program->id }}" {{ request('program') == $program->id ? 'selected' : '' }}>
                    {{ $program->name }}
                </option>
            @endforeach
        </select>

        <div class="absolute top-2 right-2">
            <button type="submit" class="h-10 w-20 text-white rounded-lg bg-green-500 hover:bg-blue-600">Search</button>
        </div>
    </div>
</form>
