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
            <a href="{{ url('/') }}"><img class="w-38" src="{{ asset('images/School-of-Graduate-Studies-logo.png') }}"
                    alt="Logo"></a>
                    <ul class="mt-6 space-y-4">
                        @auth
                        <li>
                            <span class="font-bold" style="color: black;"><i class="fas fa-user"></i> {{ auth()->user()->name }}</span>
                        </li>
                        <li class="font-bold">
                            <form class="inline" method="POST" action="{{url('/logout')}}">
                                @csrf
                                <button type="logout">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                        @if(auth()->check())
                        @switch(auth()->user()->role_id)
                        @case(1) {{-- Student --}}
                        <li class="font-bold"><a href="{{ url('/') }}">  <i class="fas fa-home"> </i>Home</a></li>
                        <li class="font-bold"><a href="{{ route('changeSupervisor') }}"><i class="fas fa-user-graduate"> </i>Request Change of Supervisor</a></li>
                        <li class="font-bold"><a href="{{ route('progress_reports.index')}}"><i class="fas fa-chart-line"> </i>Submit Progress Report</a></li>
                        <li class="font-bold"><a href="{{ route('journal.index')}}"><i class="fas fa-book"> </i>Journal Publication</a></li>
                        <li class="font-bold"><a href="{{ route('conference.index')}}"><i class="fas fa-users"> </i>Conference Publication</a></li>
                        <li class="font-bold"><a href="{{ route('thesis.index')}}"><i class="fas fa-file-alt"> </i>Thesis/Dissertation</a></li>
                        <li class="font-bold"><a href="{{ route('academic_leave.create') }}"><i class="fas fa-graduation-cap"> </i>Request for Academic
                                Leave</a></li>
                        <li class="font-bold"><a href="{{ route('conference.review')}}"><i class="fas fa-check-circle"> </i>Request for Conference Approval</a></li>
                        <li class="font-bold"><a href="{{ route('notice.submission')}}"><i class="fas fa-sticky-note"> </i>Submit Notice Of Intent</a></li><br>
                        @break
                        @case(2) {{-- Supervisor --}}
                        <li class="font-bold"><a href="{{ url('/') }}"><i class="fas fa-home"> </i>Home</a></li>
                        <li class="font-bold"><a href="{{ route('thesis.index')}}"><i class="fas fa-check-circle"> </i>Approve Thesis</a></li>
                        <li class="font-bold"><a href="{{route('progress_reports.updateReport')}}"><i class="fas fa-chart-line"> </i>Update Progress
                                Report</a></li>
                        <li class="font-bold"><a href="{{ route('view.supervisee')}}"><i class="fas fa-user-graduate"> </i>View Students</a></li>
                        <li class="font-bold"><a href="{{ route('academic_leave.view')}}"><i class="fas fa-file"> </i>Student Leave Requests</a></li>
                        @break
                        @case(3) {{-- Staff --}}
                        <li class="font-bold"><a href="{{ url('/') }}"><i class="fas fa-home"> </i>Home</a></li>
                        <li class="font-bold"><a href="/register" class="hover:text-laravel"><i class="fas fa-user-plus"> </i>
                                Register New Users</a>
                        </li>
                        <li class="font-bold"><a href="{{ route('supervisorAllocation') }}"><i class="fas fa-graduation-cap"> </i>Assign Supervisors</a></li>
                        <li class="font-bold"><a href="{{ route('supervisorStudentAllocation') }}"><i class="fas fa-user-graduate"> </i>Assign Students</a></li>
                        <li class="font-bold"><a href="{{ route('reviewChangeSupervisorRequests') }}"><i class="fas fa-exchange-alt"> </i>View Change of
                                Supervisor Requests</a></li>
                        <li class="font-bold"><a href="{{ route('academic_leave.view')}}"><i class="fas fa-file"> </i>Student Leave Requests</a></li>
                        <li class="font-bold"><a href="{{ route('thesis.admin')}}"><i class="fas fa-file-alt"> </i>Thesis Submissions</a></li>
                        <li class="font-bold"><a href="{{ route('journal.index')}}"><i class="fas fa-book"> </i> Journal Publications</a></li>
                        <li class="font-bold"><a href="{{ route('conference.index')}}"><i class="fas fa-users"> </i> Conference Publications</a></li>
                        <li class="font-bold"><a href="#"><i class="fas fa-envelope"> </i>Send Thesis Correction or Reminders</a></li>
                        <li class="font-bold"><a href="{{ route('review.record')}}"><i class="fas fa-check-circle"> </i>Conference Review Requests</a></li>
                        <li class="font-bold"><a href="{{ route('notice.record')}}"><i class="fas fa-sticky-note"> </i>Notices Of Intent</a></li>
                        <li class="font-bold"><a href="{{ route('reporting-periods.index')}}"><i class="fas fa-calendar-alt"> </i>Update Reporting
                                Periods</a></li>
                        <li class="font-bold"><a href="{{route('progress_reports.completeReport')}}"><i class="fas fa-chart-line"> </i>Complete Progress
                                Report</a></li><br>
                        @break
                        @endswitch
                        @endif
                        @else
                        <!--<li>
                            <a href="/register" class="hover:text-laravel"><i class="fas fa-user-plus"></i>
                                Register</a>
                        </li>-->
                        <li>
                            <a href="{{url('/login')}}" class="hover:text-laravel"><i class="fas fa-arrow-right"></i>
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
            @if(request()->path() !== '/' && request()->path() !== 'login' && request()->path() !== 'register' && request()->path() !== 'verify-login-otp')
            <div style="margin-top: 10px; display: flex; justify-content: flex-end;"> 
                <button class="back-button" onclick="window.history.back()">Back</button>
            </div>
            @endif
        </main>
    </div>

    <!-- Footer -->
    <div class="footer-content">
        <footer id="footer" class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-16 p-4 md:justify-center transition-opacity duration-500 opacity-100">
            <p class="ml-2">&copy; 2024, All Rights Reserved</p>
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