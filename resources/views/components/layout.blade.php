<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "blue",
                    },
                },
            },
        };
    </script>

    <style>
        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 200px; /* Initial width */
            min-width: 60px; /* Minimum width when collapsed */
            background-color: #0000FF; /* Blue color for the sidebar */
            color: white; /* Text color */
            padding: 20px; /* Padding for content */
            overflow-y: auto; /* Enable scrolling */
            transition: width 0.3s ease; /* Smooth transition for width change */
        }

        /* Sidebar when collapsed */
        .sidebar.collapsed {
            width: 60px;
            padding: 10px; /* Adjusted padding when collapsed */
        }

        /* Main content styles */
        .main-content {
            transition: margin-left 0.3s ease; /* Smooth transition for margin change */
        }

        /* Footer styles */
        .footer-content {
            margin-left: 200px; /* Adjust the margin to match the sidebar width */
            margin-bottom: 60px; /* Add space to the bottom */
        }

        /* Back button styles */
        button.back-button {
            padding: 10px 20px;
            background-color: #0000FF;
            margin-left: 10px;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-family: Arial, sans-serif;
            transition: background-color 0.3s ease;
        }

        button.back-button:hover {
            background-color: #4CAF50;
        }
    </style>

    <title>Strathmore University | SGS</title>
</head>

<body class="mb-48">
    <!-- Sidebar -->
    <div class="sidebar" x-data="{ open: false }" :class="{ 'collapsed': !open }">
        <button @click="open = !open" class="fixed top-4 left-4">
            <i class="fa-solid fa-bars"></i> <!-- Sidebar toggle button icon -->
        </button>
        <nav :class="{ 'hidden': !open, 'block': open }">
            <a href="/"><img class="w-38" src="{{ asset('images/School-of-Graduate-Studies-logo.png') }}"
                    alt="Logo"></a>
            <ul class="mt-6 space-y-4">
                @auth
                <li>
                    <span class="font-bold"> Welcome, {{ auth()->user()->name }}</span>
                </li>
                @if(auth()->check())
                @switch(auth()->user()->role_id)
                @case(1) {{-- Student --}}
                <li class="font-bold"><a href="/">Home</a></li>
                <li class="font-bold"><a href="{{ route('changeSupervisor') }}">Request Change of Supervisor</a></li>
                <li class="font-bold"><a href="{{ route('progress_reports.index')}}">Submit Progress Report</a></li>
                <li class="font-bold"><a href="{{ route('journal.index')}}"> Journal Publication</a></li>
                <li class="font-bold"><a href="{{ route('conference.index')}}"> Conference Publication</a></li>
                <li class="font-bold"><a href="{{ route('thesis.index')}}">Thesis/Dissertation</a></li>
                <li class="font-bold"><a href="{{ route('academic_leave.create') }}">Request for Academic
                        Leave</a></li>
                <li class="font-bold"><a href="{{ route('conference.review')}}">Request for Conference Approval</a></li>
                <li class="font-bold"><a href="{{ route('notice.submission')}}">Submit Notice Of Intent</a></li>
                @break
                @case(2) {{-- Supervisor --}}
                <li class="font-bold"><a href="/">Home</a></li>
                <li class="font-bold"><a href="{{ route('thesis.index')}}">Approve Thesis</a></li>
                <li class="font-bold"><a href="{{route('progress_reports.updateReport')}}">Update Progress
                        Report</a></li>
                <li class="font-bold"><a href="{{ route('view.supervisee')}}">View Students</a></li>
                @break
                @case(3) {{-- Staff --}}
                <li class="font-bold"><a href="/">Home</a></li>
                <li class="font-bold"><a href="{{ route('supervisorAllocation') }}">List of Students</a></li>
                <li class="font-bold"><a href="{{ route('supervisorStudentAllocation') }}">List of
                        Supervisors</a></li>
                <li class="font-bold"><a href="{{ route('reviewChangeSupervisorRequests') }}">View Change of
                        Supervisor Requests</a></li>
                <li class="font-bold"><a href="{{ route('academic_leave.view')}}">Student Leave Requests</a></li>
                <li class="font-bold"><a href="{{ route('thesis.index')}}">Thesis Submissions</a></li>
                <li class="font-bold"><a href="{{ route('journal.index')}}"> Journal Publications</a></li>
                <li class="font-bold"><a href="{{ route('conference.index')}}"> Conference Publications</a></li>
                <li class="font-bold"><a href="#">Send Thesis Correction or Reminders</a></li>
                <li class="font-bold"><a href="{{ route('review.record')}}">Conference Review Requests</a></li>
                <li class="font-bold"><a href="{{ route('notice.record')}}">Notices Of Intent</a></li>
                <li class="font-bold"><a href="{{ route('reporting-periods.index')}}">Update Reporting
                        Periods</a></li>
                <li class="font-bold"><a href="{{route('progress_reports.completeReport')}}">Complete Progress
                        Report</a></li>
                @break
                @endswitch
                @endif
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="logout">
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i>
                        Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
                @endauth

            </ul>
        </nav>
    </div>

    <!-- Main content -->
    <div class="main-content" :class="{ 'ml-0': !open, 'ml-60': open }">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"><img class="w-38" src="{{asset('images/School-of-Graduate-Studies-logo.png') }}" alt=""
                    class="logo" /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                <!-- Your navigation links here -->

            </ul>
        </nav>
        <main>
            {{$slot}}
            <!-- Conditionally show back button -->
            @if(request()->path() !== '/')
            <div style="margin-top: 10px;"> <!-- Wrapper for spacing -->
                <button class="back-button" onclick="window.history.back()">Back</button>
            </div>
            @endif
        </main>
    </div>

    <!-- Footer -->
    <div class="footer-content">
        <footer id="footer" class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-16 p-4 md:justify-center transition-opacity duration-500 opacity-100">
            <p class="ml-2">&copy; 2023, All Rights Reserved</p>
        </footer>
    </div>

    <script>
        let lastScrollTop = 0;
        const footer = document.getElementById('footer');

        window.addEventListener('scroll', function () {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                // Scrolling down, hide the footer
                footer.classList.remove('opacity-100');
                footer.classList.add('opacity-0');
            } else {
                // Scrolling up, show the footer
                footer.classList.remove('opacity-0');
                footer.classList.add('opacity-100');
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
        });
    </script>
    <x-flash-message></x-flash-message>
</body>
</html>