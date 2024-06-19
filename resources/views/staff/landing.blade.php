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
                    <img src="{{ asset('storage/' . $staff->profile) }}" class="w-full h-full object-cover" alt="Profile Picture">
                </div>

                <!-- Staff Information -->
                <div class="ml-4 profile-info">
                    <h3 class="text-xl font-bold mb-2">Staff Profile</h3>
                    <div class="mb-2">
                        <div class="flex justify-between">
                            <span class="font-bold bg-gray-200 px-2 py-1 rounded">Name:</span>
                            <span>{{ $staff->name }}</span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between">
                            <span class="font-bold bg-gray-200 px-2 py-1 rounded">Date of Birth:</span>
                            <span>{{ $staff->date_of_birth }}</span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between">
                            <span class="font-bold bg-gray-200 px-2 py-1 rounded">Phone Number:</span>
                            <span>{{ $staff->phone_number }}</span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between">
                            <span class="font-bold bg-gray-200 px-2 py-1 rounded">Email:</span>
                            <span>{{ $staff->email }}</span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between">
                            <span class="font-bold bg-gray-200 px-2 py-1 rounded">Religion:</span>
                            <span>{{ $staff->religion->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="hero bg-gray-100 py-20">
            <div class="container mx-auto text-center">
                <ul class="flex flex-wrap justify-center">
                    <li class="mx-4 my-2">
                        <a href="/" class="font-bold hover:underline">Home</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="/register" class="font-bold hover:underline">Register new users</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('supervisorAllocation') }}" class="font-bold hover:underline">List of Students</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('supervisorStudentAllocation') }}" class="font-bold hover:underline">List of Supervisors</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('reviewChangeSupervisorRequests') }}" class="font-bold hover:underline">View Change of Supervisor Requests</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('academic_leave.view')}}" class="font-bold hover:underline">Student Leave Requests</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('thesis.admin') }}" class="font-bold hover:underline">Thesis Submissions</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('journal.index')}}" class="font-bold hover:underline"> Journal Publications</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('conference.index')}}" class="font-bold hover:underline"> Conference Publications</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('thesis.correction')}}" class="font-bold hover:underline">Thesis Correction Reminders</a>
                    </li>
    
                    <li class="mx-4 my-2">
                        <a href="{{ route('review.record')}}" class="font-bold hover:underline">Conference Review Requests</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('notice.record')}}" class="font-bold hover:underline">Notices Of Intent</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{ route('reporting-periods.index')}}" class="font-bold hover:underline">Update Reporting Periods</a>
                    </li>
                    <li class="mx-4 my-2">
                        <a href="{{route('progress_reports.completeReport')}}" class="font-bold hover:underline">Complete Progress Report</a>
                    </li>
                </ul>
            </div>
        </section>
    </x-layout>
</body>
</html>

    <!--
    <section class="hero bg-gray-100 py-20">
        <div class="container mx-auto text-center">
            <ul class="flex flex-wrap justify-center">
                <li class="mx-4 my-2">
                    <a href="/" class="font-bold hover:underline">Home</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="/register" class="font-bold hover:underline">Register new s</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('supervisorAllocation') }}" class="font-bold hover:underline">List of Students</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('supervisorStudentAllocation') }}" class="font-bold hover:underline">List of Supervisors</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('reviewChangeSupervisorRequests') }}" class="font-bold hover:underline">View Change of Supervisor Requests</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('academic_leave.view')}}" class="font-bold hover:underline">Student Leave Requests</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('thesis.admin') }}" class="font-bold hover:underline">Thesis Submissions</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('journal.index')}}" class="font-bold hover:underline"> Journal Publications</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('conference.index')}}" class="font-bold hover:underline"> Conference Publications</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('thesis.correction')}}" class="font-bold hover:underline">Thesis Correction Reminders</a>
                </li>

                <li class="mx-4 my-2">
                    <a href="{{ route('review.record')}}" class="font-bold hover:underline">Conference Review Requests</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('notice.record')}}" class="font-bold hover:underline">Notices Of Intent</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('reporting-periods.index')}}" class="font-bold hover:underline">Update Reporting Periods</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{route('progress_reports.completeReport')}}" class="font-bold hover:underline">Complete Progress Report</a>
                </li>
            </ul>
        </div>
    </section>-->



