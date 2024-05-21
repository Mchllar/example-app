<!DOCTYPE html>
<html lang="en">
    <head>
    <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            p {
                text-align: center;
                font-size: 25px;
                line-height: 1.5;
            }
            .main-content {
                flex: 3;
                padding: 20px;
            }

            /* Table styles */
            table {
                width: 80%;
                border-collapse: collapse;
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #ddd;
            }

            th {
                background-color: #4CAF50;
                color: white;
            }
        
            .btn {
                padding: 4px 8px;
                background-color: #4CAF50;
                color: white;
                border-radius: 5px;
                width: 14%; 
                cursor: pointer;
                margin-top: 20px; 
                font-family: Arial, sans-serif;
                display: block; 
                text-align: center;

            }

            .btn:hover {
                background-color: #45a049;
            }
            .custom-button-text {
                color: blue; 
                margin-left: 10%; 
                text-decoration: underline; 
            }
        </style>

    </head>

    <body>
        <x-layout>
            <div class="main-content">
                @if (auth()->user()->role_id == 3)
                    @if ($notices->isEmpty())
                        <p>No Notices have  been posted yet.</p>
                    @else
                    <p>Notices of Intention to Submit Theses</p>
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Student Number</th>
                                <th>Student Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $groupedNotices = $notices->groupBy('student_id');
                            @endphp
                            @foreach ($groupedNotices as $studentId => $studentNotices)
                                @php
                                    $student = $studentNotices->first()->student;
                                @endphp

                                <tr class="student-row">
                                    <td>{{ $student->student_number }}</td>
                                    <td>{{ $student->user->name }}</td>
                                </tr>
                        </tbody>
                        <table class="hidden" id="submissions-{{ $student->id }}">
                            <thead>
                                <tr>
                                    <th>Thesis Title</th>
                                    <th>Proposed Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notices as $notice)
                                    <tr>
                                       <td>{{ $notice->thesis_title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($notice->proposed_date)->format('F j, Y') }}</td>
                                    </tr>
                                @endforeach   
                            </tbody>
                        @endforeach    
                        </table>
                    </table>
                    <button id="toggleButton-{{ $student->id }}" onclick="toggleSubmissions({{ $student->id }})" class="custom-button-text">View Submissions</button>
                    @endif
                @else
                    <p>Notices of Intention to Submit Theses</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Thesis Title</th>
                                <th>Proposed Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notices as $notice)
                                <tr>
                                    <td>{{ $notice->thesis_title }}</td>
                                    <td>{{ \Carbon\Carbon::parse($notice->proposed_date)->format('F j, Y') }}</td>
                                </tr>
                            @endforeach   
                        </tbody>
                    </table>
                    <a href="{{ route('notice.submission') }}" class="btn btn-primary">Submit New Notice</a>

                @endif       
            </div>
        </x-layout>
        <script>
            function toggleSubmissions(studentId) {
            var noticesTable = document.getElementById("submissions-" + studentId);
            var button = document.getElementById("toggleButton-" + studentId);

            // Toggle the visibility of the submission section
            noticesTable.classList.toggle("hidden");

            // Toggle the button text between "View Submissions" and "Minimize"
            if (button.textContent === 'View Submissions') {
                button.textContent = 'Minimize';
            } else {
                button.textContent = 'View Submissions';
            }
        }
        </script>
    </body>
</html>    

