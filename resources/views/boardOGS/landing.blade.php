<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .profile-info {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <x-layout>
        <div class="container mx-auto px-4 mt-10">
            <h2 class="text-4xl font-bold mb-4">Welcome to SGS</h2>
            <div class="flex justify-center items-center">
                <!-- Profile Picture -->
                <div class="w-48 h-48 overflow-hidden rounded-full">
                    <img src="{{ asset('storage/' . $board->profile) }}" class="w-full h-full object-cover" alt="Profile Picture">
                </div>

                <!-- Staff Information -->
                <div class="ml-4 profile-info">
                    <h3 class="text-xl font-bold mb-2">Member Profile</h3>
                    <div class="mb-2">
                        <div class="flex justify-between">
                            <span class="font-bold bg-gray-200 px-2 py-1 rounded">Name:</span>
                            <span>{{ $board->name }}</span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between">
                            <span class="font-bold bg-gray-200 px-2 py-1 rounded">Date of Birth:</span>
                            <span>{{ $board->date_of_birth }}</span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between">
                            <span class="font-bold bg-gray-200 px-2 py-1 rounded">Phone Number:</span>
                            <span>{{ $board->phone_number }}</span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between">
                            <span class="font-bold bg-gray-200 px-2 py-1 rounded">Email:</span>
                            <span>{{ $board->email }}</span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between">
                            <span class="font-bold bg-gray-200 px-2 py-1 rounded">Religion:</span>
                            <span>{{ $board->religion->name ?? 'N/A' }}</span>
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
                        <a href="{{ route('reviewChangeSupervisorRequests') }}" class="font-bold hover:underline">View Change of Supervisor Requests</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('academic_leave.view')}}" class="font-bold hover:underline">Student Leave Requests</a>
                    </li>
                </ul>
            </div>
        </section>
    </x-layout>
</body>
</html>