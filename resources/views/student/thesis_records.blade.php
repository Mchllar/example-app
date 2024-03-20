<x-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
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
            width: 100%;
            border-collapse: collapse;
        }

        .table-container {
            margin: 20px auto; /* Apply margin to the container and center it horizontally */
            width: 80%; /* Adjust width as needed */
            text-align: center; /* Center the content horizontally */
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
        .btn {
            width: 30%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }

    
    </style>
</head>
<body>
    @if (isset($thesis) && !$thesis->isEmpty())
        <p>List of your Thesis/Dissertation Documents</p>
    <div class="table-container">
    <table class="custom-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Thesis/Dissertation File</th>
                <th>Submission Type</th>
                <th>Upload Date</th>
                
            <!-- <th>Edit</th>
                <th>Supervisor Clearance</th>
                <button> Send Reminder</button> -->
            </tr>
        </thead>
        <tbody>
            <tr>
            @foreach ($thesis as $row)
                <td>{{ $row['id'] }}</td>
                <td>{{ $row['thesis'] }}</td>
                <td>{{ $row['submission_type'] }}</td>
                <td>{{ $row['created_at'] }}</td>   
            </tr>
            @endforeach 
        </tbody>
    </table>
    </div>
    @else
        <p>Currently, You have no Thesis/Dissertation Submissions</p>   
    @endif
        
    <a href="{{ route('thesis.submission') }}" class="btn btn-primary">Submit Thesis</a>
</body>
</html>
</x-layout>
