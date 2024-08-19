<x-layout>
    @include('partials._searchUsers')
    <div class="mx-4">
        <x-card class="p-10 rounded max-w-4xl mx-auto mt-24">
            <header class="text-center mb-6">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    User List
                </h2>
            </header>

            <!-- User List Table -->
            <table class="min-w-full bg-white border border-gray-200 rounded">
                <thead>
                    <tr>
                        <th class="border-b p-2 text-left">ID</th>
                        <th class="border-b p-2 text-left">Name</th>
                        <th class="border-b p-2 text-left">Email</th>
                        <th class="border-b p-2 text-left">Role</th>
                        <th class="border-b p-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="border-b p-2">{{ $user->id }}</td>
                            <td class="border-b p-2">{{ $user->name }}</td>
                            <td class="border-b p-2">{{ $user->email }}</td>
                            <td class="border-b p-2">{{ $user->role->name ?? 'N/A' }}</td>
                            <td class="border-b p-2">
                                <a href="{{ route('auth.edit', $user->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->appends(request()->input())->links() }}
        </x-card>
    </div>
</x-layout>
