<x-layout>
    @include('partials._hero')
    @include('partials._search')
<body>
    <main>
        <section class="hero">
            <div class="container">
                <h1>Welcome, Admin!</h1>
                <p>This is the dashboard for admin users.</p>
                <!-- Include any admin-specific content or functionality -->
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">List of Students</a></li>
                    <li><a href="">List of Supervisors</a></li>
                    <li><a href="">View Submitted Thesis</a></li>
                    <li><a href="">Send Thesis Correction or Reminders</a></li>
                    <li><a href="">Submit Thesis/Dissertation</a></li>
                    <li><a href="">View Student Leave Requests</a></li>
                    <li><a href="">View Conference Approvals</a></li>
                    <li><a href="">View Submited Notice Of Intent</a></li>
                </ul>
                
            </div>
        </section>
    </main>
</body>
</x-layout>