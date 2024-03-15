<x-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
        .custom-table {
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #f2f2f2;
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
</head>
<body>

<table class="custom-table">
    <thead>
        <tr>
            <th>Number</th>
            <th>Thesis/Dissertation File</th>
            <th>Upload Date</th>
            <th>Submission Type</th>
            <th>Edit</th>
            <th>Supervisor Clearance</th>
            <button> Send Reminder</button> 
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Data 1</td>
            <td>Data 2</td>
            <td>Data 3</td>
            <td>Data 4</td>
            <td>Data 5</td>
            <td>Data 6</td>
            <td>Data 7</td>
        </tr>
        <!-- Repeat the above row 6 more times to have 7 rows in total -->
    </tbody>
</table>
    <p>Currently, You have no Thesis Submissions</p>    
    <a href="{{ route('submission') }}" class="btn btn-primary">Submit Thesis</a>



</body>
</html>
</x-layout>
