<form action="{{ route('academic_leave.view') }}" method="GET" class="absolute top-4 right-4 z-50">
    <div class="relative border-2 border-gray-100 rounded-lg flex">
        <div class="relative">
            <div class="absolute top-4 left-3">
                <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
            </div>
            <input type="text" name="search" class="h-14 w-60 pl-10 pr-4 rounded-l-lg z-0 focus:shadow focus:outline-none" placeholder="Search for Your Student" value="{{ request('search') }}" />
        </div>
        <div class="relative">
            <select name="program" class="h-14 pl-3 pr-10 bg-white border-l-0 border-gray-100 rounded-r-lg focus:shadow focus:outline-none">
                <option value="">Filter by Program</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}" {{ request('program') == $program->id ? 'selected' : '' }}>
                        {{ $program->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="absolute top-2 right-2">
            <button type="submit" class="h-10 w-20 text-white rounded-lg bg-green-500 hover:bg-blue-600">Search</button>
        </div>
    </div>
</form>