<x-layout>
    @include('partials._hero')
    @include('partials._search')
    
<body>
    <main>
        <section class="hero">
            <div class="container">
                <h1>Welcome, Supervisor!</h1>
                <p>This is the dashboard for supervisor users.</p>
                <!-- Include any supervisor-specific content or functionality -->
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Approve Thesis</a></li>
                    <li><a href="">Update Progress Report</a></li>
                    <li><a href="">View Students</a></li>
                </ul>
                
            </div>
        </section>
    </main>
</body>
</x-layout>