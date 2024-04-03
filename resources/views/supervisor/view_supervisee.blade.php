<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- External CSS -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container {
            margin: 20px auto; /* Apply margin to the container and center it horizontally */
            width: 80%; /* Adjust width as needed */
            text-align: center; /* Center the content horizontally */
            overflow-x: auto; /* Allow horizontal scrolling if needed */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            white-space: nowrap; /* Prevent text wrapping */
            overflow: hidden; /* Hide overflowing content */
            text-overflow: ellipsis; /* Display ellipsis for overflow text */
        }

        th {
            /*background-color: #f2f2f2;*/
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
        
        p {
            text-align: center;
            font-size: 25px;
            line-height: 1.5;
        }



    </style>
</head>
<body>
<x-layout>
    <p>List of Supervisees</p>

    <div class="table-container">   
        <table>
            <thead>
                <tr>
                    <th>Student Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Program Name</th>
                    <th>Academic Status</th>
                    <th>Thesis Submission Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supervisorAllocations as $allocation)
                    <tr>
                        <td>{{ $allocation->student->student_number }}</td>
                        <td>{{ $allocation->student->user->name }}</td>
                        <td>{{ $allocation->student->user->email }}</td>
                        <td>{{ $allocation->student->program->name }}</td>
                        <td>{{ $allocation->student->academic_status }}</td>
                        <td>
    @if ($allocation->student->user_id) {{-- Check if student has a user_id --}}
        @if ($theses->contains('user_id', $allocation->student->user_id)) {{-- Check if student has submitted a thesis --}}
            Submitted
        @else
            Not Submitted
        @endif
    @else
        Not Submitted
    @endif
</td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-layout> 
</body>