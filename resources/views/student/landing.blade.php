<x-layout>
    <section class="hero bg-gray-100 py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to Graduate Studies</h1>
            <p class="text-lg text-gray-700 mb-8">Explore our programs and take the next step in your academic journey.</p>
            <ul class="flex flex-wrap justify-center">
                <li class="mx-4 my-2">
                    <a href="/" class="font-bold hover:underline">Home</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('change-supervisor-request-form') }}" class="font-bold hover:underline">Request Change of Supervisor</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('progress_reports.index')}}" class="font-bold hover:underline">Submit Progress Report</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('journal.retrieve')}}" class="font-bold hover:underline">Submit Journal Publication</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('conference.retrieve')}}" class="font-bold hover:underline">Submit Conference Publication</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('index')}}" class="font-bold hover:underline">Submit Thesis/Dissertation</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('academic_leave.create') }}" class="font-bold hover:underline">Request for Academic Leave</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('conferenceReview')}}" class="font-bold hover:underline">Request for Conference Approval</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('noticeSubmission')}}" class="font-bold hover:underline">Submit Notice Of Intent</a>
                </li>
            </ul>
        </div>
    </section>
</x-layout>




