<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('pdfjs/web/viewer.css') }}" rel="stylesheet">

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

        /* Apply basic styles to the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Center the table horizontally within its container */
        .table-container {
            margin: 20px auto;
            width: 90%;
            overflow-x: auto; /* Allow horizontal scrolling if needed */
        }

        /* Apply styles to table header cells */
        th {
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        /* Apply styles to table data cells */
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        /* Apply background color to even rows for better readability */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Hover effect on rows */
        tr:hover {
            background-color: #f5f5f5;
        }

        /* Apply ellipsis to text overflow in cells */
        td, th {
            white-space: nowrap; 
            overflow: hidden; 
            text-overflow: ellipsis;
        }

        .btn {
            padding: 4px 8px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            width: 10%; 
            cursor: pointer;
            margin-top: 20px;
            margin-left: 10px; 
            font-family: Arial, sans-serif;
            display: block; 
            text-align: center;

        }

        .btn:hover {
            background-color: green; /* Darker shade of blue on hover */
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
            margin-top: 10px; 
            font-family: Arial, sans-serif;
            display: block; 
        }

        .edit-file-button:hover {
            background-color: #dc3545; /* Red color */
        }

        .center-cell {
            text-align: center;
        }

        .button-container {
            float: right;
            margin-left: 10px; 
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

        .confirmation {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
        }

        th {
            background-color: #4CAF50;
            color: white;
            }

        .document-link:hover {
            cursor: pointer;
            color: green; 
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
                        @if(auth()->user()->role_id == 2) 
                            <th>Student Name</th>
                        @else
                            <th>ID</th>
                        @endif
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
                            @if(auth()->user()->role_id == 1)
                                <td>{{ $row['id'] }}</td>
                            @elseif(auth()->user()->role_id == 2)
                                <td>{{ $row->user->name }}</td>                            
                            @endif
                            <td>
                                <div class="file-info">
                                    <span class="document-link" onclick="openDocument('{{ asset('thesis_documents/' . $row->thesis_document) }}')">{{ $row->thesis_document }}</span>

                                    @if(auth()->user()->role_id == 1) 
                                        @php
                                            $approval = \App\Models\ThesisApproval::where('submission_id', $row['id'])->first();
                                        @endphp
                                        @if(!$approval)
                                            <form id="uploadForm{{ $row['id'] }}" action="{{ route('thesis.update', $row['id']) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <input id="fileInput{{ $row['id'] }}" type="file" name="thesis_document" onchange="uploadNewFile({{ $row['id'] }})" style="display: none;">
                                                <label for="fileInput{{ $row['id'] }}" class="edit-file-button">
                                                    <span>Replace File</span>
                                                </label>
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if ($row['submission_type'] == 1)
                                    Pre Defense
                                @elseif ($row['submission_type'] == 2)
                                    Post Defense
                                @else
                                    Unknown
                                @endif
                            </td>
                            <td>{{ $row['created_at'] }}</td>  
                            <td>{{ $row['updated_at'] }}</td> 
                            <td class="center-cell">
                                <span class="document-link" onclick="openDocument('{{ asset('corrections_forms/' . $row->correction_form) }}')">
                                    {{ $row['correction_form'] ? $row['correction_form'] : '-' }}
                                </span>
                            </td>
                            <td class="center-cell">
                                <span class="document-link" onclick="openDocument('{{ asset('corrections_summaries/' . $row->correction_summary) }}')">
                                    {{ $row['correction_summary'] ? $row['correction_summary'] : '-' }}
                                </span>
                            </td>
                            @if(auth()->user()->role_id == 1) {{-- Check if user is a student --}}
                                <td>
                                    <?php
                                        // Retrieve the student record based on the user_id from the theses table
                                        $student = \App\Models\Student::where('user_id', $row->user_id)->first();

                                        if($student) {
                                            // Retrieve supervisor IDs associated with the student from SupervisorAllocation table
                                            $supervisorIds = \App\Models\SupervisorAllocation::where('student_id', $student->id)->pluck('supervisor_id');

                                            if($supervisorIds->isEmpty()){
                                                echo '<span style="color: red;">No supervisor assigned</span>';
                                            } else {
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

                                                // Display the 'Approve' button or 'Approved' text based on approval status
                                                if (!empty($supervisorEmails)) {
                                                    echo '<button id="sendReminderBtn">Send Reminder</button>';
                                                } 
                                            }
                                        }
                                    ?>
                                </td>
                            @elseif(auth()->user()->role_id == 2)
                                <td>
                                    @php
                                        // Check if a record exists in the thesis approvals table for the current submission and supervisor
                                        $approval = \App\Models\ThesisApproval::where('supervisor_id', auth()->user()->id)
                                                                            ->where('submission_id', $row['id'])
                                                                            ->first();
                                    @endphp
                                    
                                    @if($approval)
                                        <span class="approval-text" style="color: green;">Approved</span>
                                    @else
                                        <div id="approvalContainer{{ $row['id'] }}" class="approval-container">
                                            <form id="approvalForm{{ $row['id'] }}" action="{{ route('thesis.approval') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="submission_id" value="{{ $row['id'] }}">
                                                <button id="approveButton{{ $row['id'] }}" class="approve-button" onclick="approveSubmission({{ $row['id'] }})">Approve</button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            @endif
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
        function openDocument(pdfUrl) {
            window.open(pdfUrl, '_blank');
        }
    </script>

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
                window.location.reload();

            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
                // Handle error
            });
        }

    </script>  

    <!-- JavaScript code to send AJAX request -->
    <script>
    document.getElementById('sendReminderBtn').addEventListener('click', function() {
        var supervisorEmails = <?php echo json_encode($supervisorEmails ?? []); ?>;
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

    <script>
        function approveSubmission(id) {
            // Hide the button
            document.getElementById('approveButton' + id).style.display = 'none';
            // Show the text
            document.getElementById('approvalText' + id).style.display = 'inline';

        }
    </script>

    </body>
</html>

