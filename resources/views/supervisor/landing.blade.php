<x-layout>
    <section class="hero bg-gray-100 py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome, Supervisor!</h1>
            <p class="text-lg text-gray-700 mb-8">This is the dashboard for supervisor users.</p>
            <ul class="flex flex-wrap justify-center">
                <li class="mx-4 my-2">
                    <a href="/" class="font-bold hover:underline">Home</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('thesis.index')}}" class="font-bold hover:underline">Approve Thesis</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="#" class="font-bold hover:underline">Update Progress Report</a>
                </li>
                <li class="mx-4 my-2">
                    <a href="{{ route('view.supervisee')}}" class="font-bold hover:underline">View Students</a>
                </li>
            </ul>
        </div>
    </section>
</x-layout>
