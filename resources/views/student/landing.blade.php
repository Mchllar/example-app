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
                <img src="{{ asset('storage/' . $student->user->profile) }}" class="w-full h-full object-cover" alt="Profile Picture">
            </div>

            <!-- Student Information -->
            <div class="ml-4">
                <div class="info-container">
                    <h3 class="text-xl font-bold mb-2">Student Profile</h3>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold bg-gray-200 px-2 py-1 rounded">Student Number:</span>
                        <span>{{ $student->student_number }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold bg-gray-200 px-2 py-1 rounded">Name:</span>
                        <span>{{ $student->user->name }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold bg-gray-200 px-2 py-1 rounded">Date of Birth:</span>
                        <span>{{ $student->user->date_of_birth }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold bg-gray-200 px-2 py-1 rounded">Phone Number:</span>
                        <span>{{ $student->user->phone_number }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold bg-gray-200 px-2 py-1 rounded">Email:</span>
                        <span>{{ $student->user->email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-bold bg-gray-200 px-2 py-1 rounded">Religion:</span>
                        <span>{{ $student->user->religion->name ?? 'N/A' }}</span>
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
                    <a href="{{ route('changeSupervisor') }}" class="font-bold hover:underline">Request Change of Supervisor</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('progress_reports.index')}}" class="font-bold hover:underline">Submit Progress Report</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('journal.index')}}" class="font-bold hover:underline"> Journal Publication</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('conference.index')}}" class="font-bold hover:underline"> Conference Publication</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('thesis.index')}}" class="font-bold hover:underline">Thesis/Dissertation</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('academic_leave.create') }}" class="font-bold hover:underline">Request for Academic Leave</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('review.record')}}" class="font-bold hover:underline">Request for Conference Approval</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('notice.record')}}" class="font-bold hover:underline">Submit Notice Of Intent</a>
                </li>
                <li class="mx-4 my-2">
                        <a href="{{route('admin.defense')}}" class="font-bold hover:underline">Defense Records</a>
                </li>
            </ul>
        </div>
    </section>
</x-layout>







<!--<section class="hero bg-gray-100 py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to Graduate Studies</h1>
            <p class="text-lg text-gray-700 mb-8">Explore our programs and take the next step in your academic journey.</p>
            <ul class="flex flex-wrap justify-center">
                <li class="mx-4 my-2">
                    <a href="/" class="font-bold hover:underline">Home</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('changeSupervisor') }}" class="font-bold hover:underline">Request Change of Supervisor</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('progress_reports.index')}}" class="font-bold hover:underline">Submit Progress Report</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('journal.index')}}" class="font-bold hover:underline"> Journal Publication</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('conference.index')}}" class="font-bold hover:underline"> Conference Publication</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('thesis.index')}}" class="font-bold hover:underline">Thesis/Dissertation</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('academic_leave.create') }}" class="font-bold hover:underline">Request for Academic Leave</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('review.record')}}" class="font-bold hover:underline">Request for Conference Approval</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('notice.record')}}" class="font-bold hover:underline">Submit Notice Of Intent</a>
                </li>
            </ul>
        </div>
    </section>
    -->




