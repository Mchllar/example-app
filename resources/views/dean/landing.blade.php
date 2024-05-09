<x-layout>
    <section class="hero bg-gray-100 py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome </h1>
            <ul class="flex flex-wrap justify-center">
                <li class="mx-4 my-2">
                    <a href="/" class="font-bold hover:underline">Home</a>
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
