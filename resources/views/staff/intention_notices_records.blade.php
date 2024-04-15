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
        </style>

    </head>

    <body>
        <x-layout>
            <div class="main-content">
                
                @if ($notices->isEmpty())
                    <p>No notices found.</p>
                @else
                <p>Notices of Intention to Submit Theses</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Student Number</th>
                                <th>Student Name</th>
                                <th>Thesis Title</th>
                                <th>Proposed Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notices as $notice)
                                <tr>
                                    <td>{{ $notice->student->student_number }}</td>
                                    <td>{{ $notice->student->user->name }}</td>
                                    <td>{{ $notice->thesis_title }}</td>
                                    <td>{{ \Carbon\Carbon::parse($notice->proposed_date)->format('F j, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </x-layout>
    </body>
</html>    

