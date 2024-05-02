<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="path/to/styles.css">
        <style>
            .text-4xl {
                font-size: 2.25rem; /* equivalent to 36px */
            }

            .text-lg {
                font-size: 1.125rem; /* equivalent to 18px */
            }

            .font-bold {
                font-weight: bold;
            }

            .text-gray-700 {
                color: #4b5563; /* equivalent to gray-700 color */
            }

            /* Button styles */
            .hover\:underline:hover {
                text-decoration: underline;
            }

            /* Layout styles */
            .hero {
                /* styles for hero section */
                background-color: #f7fafc; /* equivalent to bg-gray-100 */
                padding-top: 5rem; /* equivalent to py-20 */
                padding-bottom: 5rem; /* equivalent to py-20 */
            }

            .container {
                width: 100%; /* equivalent to mx-auto */
                max-width: 1024px; /* adjust as needed */
                margin-right: auto;
                margin-left: auto;
                padding-right: 1rem;
                padding-left: 1rem;
            }

            .text-center {
                text-align: center;
            }

            .flex {
                display: flex;
            }

            .flex-wrap {
                flex-wrap: wrap;
            }

            .justify-center {
                justify-content: center;
            }

            .mx-4 {
                margin-right: 1rem;
                margin-left: 1rem;
            }

            .my-2 {
                margin-top: 0.5rem;
                margin-bottom: 0.5rem;
            }
        </style>
    </head>
    <body>
        <x-layout>
        <section class="hero bg-gray-100 py-20">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl font-bold mb-4">Welcome, Admin!</h1>
                <p class="text-lg text-gray-700 mb-8">This is the dashboard for admin users.</p>
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
                        <a href="#" class="font-bold hover:underline">Send Thesis Correction or Reminders</a>
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

