<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page title -->
    <title>Your Page Title</title>
    <!-- External CSS -->
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
            width: 100%; /* Adjust width as needed */
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
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .btn {
            padding: 8px; /* Adjust button padding */
            background-color: #007bff; /* Blue color */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            width: 100%; /* Set button width to 100% */
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
            background-color: #0000FF; 
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
            background-color: #4CAF50; 
        }

        .clearance-row {
            /* Initially hide clearance row for non-supervisors */
            display: none;
        }  
        
        /* Default button style */
        #sendReminderBtn {
            background-color: #4CAF50;
            border: 1px solid black;
            color: black;
            padding: 2px 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px;
            transition: background-color 0.3s, color 0.3s;
            width: 100%; /* Set button width to 100% */
        }

        /* Style for hover effect */
        #sendReminderBtn:hover {
            background-color: red;
            color: white;
        }

        /* Style for active state */
        #sendReminderBtn:active {
            background-color: green;
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
            @else
                <th>Supervisor Clearance</th>  
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
                @if(auth()->user()->role_id == 1) {{-- Check if user is a student --}}
                <td>
                    <?php
                        // Retrieve the student record based on the user_id from the theses table
                        $student = \App\Models\Student::where('user_id', $row->user_id)->first();

                        if($student) {
                            // Retrieve supervisor IDs associated with the student from SupervisorAllocation table
                            $supervisorIds = \App\Models\SupervisorAllocation::where('student_id', $student->id)->pluck('supervisor_id');

                            // Initialize an array to store supervisor names and their respective statuses
                            $supervisorsInfo = [];
                            $supervisorEmails = [];

                            foreach ($supervisorIds as $supervisorId) {
                                // Retrieve the supervisor's name
                                $supervisorName = \App\Models\User::find($supervisorId)->name;
                                
                                // Retrieve the supervisor's email
                                $supervisorEmail = \App\Models\User::find($supervisorId)->email;

                                // Check if the supervisor has approved the document
                                $approval = \App\Models\ThesisApproval::where('supervisor_id', $supervisorId)
                                    ->where('submission_id', $row->id)
                                    ->first();

                                // Determine the status based on approval existence
                                $status = $approval ? 'Approved' : 'Not Approved';

                                // Add supervisor's name and status to the array
                                $supervisorsInfo[] = [
                                    'name' => $supervisorName,
                                    'status' => $status
                                ];

                                // Add supervisor's email to the array if not approved
                                if ($status != 'Approved') {
                                    $supervisorEmails[] = $supervisorEmail;
                                }
                            }

                            // Display supervisor names and their respective statuses 
                            foreach ($supervisorsInfo as $supervisorInfo) {
                                echo $supervisorInfo['name'] . ' (' . $supervisorInfo['status'] . ')<br>';
                            }

                            // Implement reminder button
                        //if (!empty($supervisorEmails)) {
                            // Pass the $supervisorEmails array to JavaScript function
                           // echo '<button id="sendReminderBtn" onclick="sendReminder(' . htmlspecialchars(json_encode($supervisorEmails), ENT_QUOTES, 'UTF-8') . ')">Send Reminder</button>';
                        //}
                      if (!empty($supervisorEmails)){
                        echo '<button id="sendReminderBtn">Send Reminder</button>';
                      }
                        

                       
                        }
                    ?>
                </td>
                @endif
                    <td>
                        @if(auth()->user()->role_id == 2) {{-- Check if user is a supervisor --}}
                            <div id="approvalContainer{{ $row['id'] }}" class="approval-container">
                                <form id="approvalForm{{ $row['id'] }}" action="{{ route('thesis.approval') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="submission_id" value="{{ $row['id'] }}">
                                    <button id="approveButton{{ $row['id'] }}" class="approve-button">Approve</button>
                                </form>
                                <!--<span id="approvalText{{ $row['id'] }}" class="approval-text" style="display: none; color: green;">Approved</span>-->
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>


    </div>

    @else
        <p>No Thesis/Dissertation Submissions</p>   
    @endif

    @if(auth()->user()->role_id == 1) {{-- Check if user is a student --}}
        <a href="{{ route('thesis.submission') }}" class="btn btn-primary">Submit Thesis</a>
    @endif
</x-layout>


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

    </script>  

   <!-- <script>
    function sendReminder(supervisorEmails) {

        // Check if supervisorEmails is an array
        if (Array.isArray(supervisorEmails)) {
            // Display pop-up with supervisor's emails
            var confirmation = confirm("Reminders will be sent to the following recipients:\n\n" + supervisorEmails.join('\n') + "\n\nContinue?");
            
            if (confirmation) {              
            alert('Reminders sent to:\n\n' + supervisorEmails.join('\n'));

            }
        } else {
            // Handle the case where supervisorEmails is not an array
            console.error("supervisorEmails is not an array");
        }
    }
    </script> -->



<!-- JavaScript code to send AJAX request -->
<script>
document.getElementById('sendReminderBtn').addEventListener('click', function() {
    var supervisorEmails = <?php echo json_encode($supervisorEmails); ?>;
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); 

    if (Array.isArray(supervisorEmails)) {
        var confirmation = confirm("Reminders will be sent to the following recipients:\n\n" + supervisorEmails.join('\n') + "\n\nContinue?");
        
        if (confirmation) {              
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/sendReminder', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', token); 
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        alert(xhr.responseText);
                    } else {
                        alert('Error: ' + xhr.status);
                    }
                }
            };
            xhr.send(JSON.stringify({ emails: supervisorEmails }));
        }
    } else {
        console.error("supervisorEmails is not an array");
    }
});
</script>

    </body>
</html>

