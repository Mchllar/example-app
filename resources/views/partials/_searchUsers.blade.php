<form action="{{ route('users.index') }}" method="GET" class="absolute top-16 right-4 z-50">
    <div class="relative border-2 border-gray-100 rounded-lg">
        <div class="absolute top-4 left-3">
            <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
        </div>
        <input type="text" name="search" class="h-14 w-60 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search Here" value="{{ request('search') }}" />
        
        <select name="role_id" class="h-14 pl-3 pr-10 rounded-lg z-0 focus:shadow focus:outline-none">
            <option value="">All Roles</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ request('role_id') == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
        
        <div class="absolute top-2 right-2">
            <button type="submit" class="h-10 w-20 text-white rounded-lg bg-green-500 hover:bg-blue-600">Search</button>
        </div>
    </div>
</form>
