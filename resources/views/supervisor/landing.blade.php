<x-layout>
    <style>
        .info-container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }
    </style>

    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold mb-4">Welcome to Graduate Studies</h2>
        <div class="flex justify-center items-center">
            <!-- Profile Picture -->
            <div class="w-48 h-48 overflow-hidden rounded-full">
                <img src="{{ asset('storage/' . $supervisor->user->profile) }}" class="w-full h-full object-cover" alt="Profile Picture">
            </div>

            <!-- Student Information -->
            <div class="ml-4">
                <div class="info-container">
                    <h3 class="text-xl font-bold mb-2">Supervisor's Profile</h3>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold bg-gray-200 px-2 py-1 rounded">Name:</span>
                        <span>{{ $supervisor->user->name }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold bg-gray-200 px-2 py-1 rounded">Date of Birth:</span>
                        <span>{{ $supervisor->user->date_of_birth }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold bg-gray-200 px-2 py-1 rounded">Phone Number:</span>
                        <span>{{ $supervisor->user->phone_number }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold bg-gray-200 px-2 py-1 rounded">Email:</span>
                        <span>{{ $supervisor->user->email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-bold bg-gray-200 px-2 py-1 rounded">Religion:</span>
                        <span>{{ $supervisor->user->religion->name ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="hero bg-gray-100 py-20">
        <div class="container mx-auto text-center">
                <ul class="flex flex-wrap justify-center">
                    <li class="mx-4 my-2">
                        <a href="{{ url('/') }}" class="font-bold hover:underline">Home</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('thesis.index')}}" class="font-bold hover:underline">Approve Thesis</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{route('progress_reports.updateReport')}}" class="font-bold hover:underline">Update Progress Report</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('view.supervisee')}}" class="font-bold hover:underline">View Students</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('academic_leave.view')}}" class="font-bold hover:underline">Student Leave Requests</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{route('admin.defense')}}" class="font-bold hover:underline">Defense Records</a>
                    </li>
            </ul>
        </div>
    </section>
</x-layout>