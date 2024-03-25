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
            background-color: #007bff; /* Blue color */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: Arial, sans-serif;
        }

        .btn:hover {
            background-color: #0056b3; /* Darker shade of blue on hover */
        }

        .file-info {
            display: flex; /* Use flexbox for layout */
            align-items: center; /* Center vertically */
            flex-direction: column; /* Set column direction */
        }

        .edit-file-button {
            background-color: #007bff;
            color: white;
            padding: 4px 8px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px; /* Add space between file name and button */
            font-family: Arial, sans-serif; /* Specify font family */
        }

        .edit-file-button:hover {
            background-color: #dc3545; /* Red color */
        }

        .center-cell {
            text-align: center;
        }

        .button-container {
            float: right;
            margin-left: 10px; /* Adjust as needed */
        }

        .approve-button {
            background-color: #0000FF; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .approve-button:hover {
            background-color: #4CAF50; /* Darker shade of green on hover */
        }

        .clearance-row {
            /* Initially hide clearance row for non-supervisors */
            display: none;
        }

     
    </style>
</head>
<body>
<x-layout>
    @if (isset($thesis) && !$thesis->isEmpty())
        <p>List of Thesis/Dissertation Documents</p>
        <div class="table-container">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Thesis/Dissertation File</th>
                        <th>Submission Type</th>
                        <th>Upload Date</th>
                        <th>Update On</th>
                        <th>Correction Form</th>
                        <th>Correction Summary</th>
                        @if(auth()->user()->role_id == 2) 
                        <th>Clearance</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($thesis as $row)
                        <tr>
                            <td>{{ $row['id'] }}</td>
                            <td>
                                <div class="file-info">
                                    <span>{{ $row['thesis_document'] }}</span>
                                    @if(auth()->user()->role_id == 1) 
                                        <form id="uploadForm{{ $row['id'] }}" action="{{ route('thesis.update', $row['id']) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input id="fileInput{{ $row['id'] }}" type="file" name="thesis_document" onchange="uploadNewFile({{ $row['id'] }})" style="display: none;">
                                            <label for="fileInput{{ $row['id'] }}" class="edit-file-button">
                                                <span>Edit File</span>
                                            </label>
                                        </form>
                                    @endif
                                </div>
                            </td>
                            <td>{{ $row['submission_type'] }}</td>
                            <td>{{ $row['created_at'] }}</td>  
                            <td>{{ $row['updated_at'] }}</td> 
                            <td class="center-cell">{{ $row['correction_form'] ? $row['correction_form'] : '-' }}</td>
                            <td class="center-cell">{{ $row['correction_summary'] ? $row['correction_summary'] : '-' }}</td>
                            <td>
                                <!-- Approval button will be appended here -->
                                    @if(auth()->user()->role_id == 2) {{-- Check if user is a supervisor --}}
                                    <div class="button-container">
                                        <button class="approve-button">Approve</button>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
        <button onclick="reloadPage()">Reload Page</button>
    @else
        <p>No Thesis/Dissertation Submissions</p>   
    @endif

    @if(auth()->user()->role_id == 1) {{-- Check if user is a student --}}
        <a href="{{ route('thesis.submission') }}" class="btn btn-primary">Submit Thesis</a>
    @endif

    <script>
        function uploadNewFile(id) {
            var form = document.getElementById('uploadForm' + id);
            var fileInput = form.querySelector('input[type="file"]');
            var file = fileInput.files[0];
            
            var formData = new FormData();
            formData.append('thesis_document', file);

            fetch(`/thesis/${id}`, {  // Make sure the URL is correct  // Make sure the URL is correct
                method: 'POST', // Set the method to POST
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                // Handle success response
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
                // Handle error
            });
        }

        function reloadPage() {
            location.reload();
        }
    </script>    
    </body>
</html>
</x-layout>
