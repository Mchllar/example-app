<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
        
                position: relative;
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

            table {
                width: 100%;
                border-collapse: collapse;
            }

            .table-container {
                margin: 20px auto;
                width: 90%;
                overflow-x: auto; 
            }

            th {
                background-color: #f2f2f2;
                border: 1px solid #ddd;
                padding: 10px;
                text-align: left;
            }

            td {
                border: 1px solid #ddd;
                padding: 10px;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

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
                background-color: green; 
            }

            .file-info {
                display: flex; 
                align-items: center; 
                flex-direction: column; 
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
                background-color: #dc3545; 
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
                display: none;
            }  
            
            #sendReminderBtn {
                background-color: #4CAF50;
                border: 1px solid black;
                color: black;
                padding: 2px 10px;
                font-size: 16px;
                cursor: pointer;
                border-radius: 10px;
                transition: background-color 0.3s, color 0.3s;
                width: 100%; 
            }

            #sendReminderBtn:hover {
                background-color: red;
                color: white;
            }

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

            #pdfContainer {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
                z-index: 999;
            }

            #pdfContainer button {
                position: absolute;
                top: 10px;
                right: 10px;
                padding: 8px 8px;
                background-color: red;
                color: white;
                border: none;
                cursor: pointer;           
            }

            #pdfContainer iframe {
                width: 80%;
                height: 80%;
                border: none;
            }
        </style>

    </head>
    <body>
        <div id="pdfContainer">
            <button onclick="closeDocument()">Close</button>
            <iframe id="pdfViewer" frameborder="0"></iframe>
        </div>

        <x-layout>
            @if (isset($thesis) && !$thesis->isEmpty())
                <p>List of Thesis/Dissertation Documents</p>
                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                @if(auth()->user()->role_id == 2 || auth()->user()->role_id == 3) 
                                    <th>Student Name</th>
                                @else
                                    <th>ID</th>
                                @endif
                                <th>Thesis/Dissertation File</th>
                                <th>Submission Type</th>
                                <th>Submission Date</th>
                                <th>Correction Form</th>
                                <th>Correction Summary</th>
                                @if(auth()->user()->role_id == 2 || auth()->user()->role_id == 3) 
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
                                    @elseif(auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
                                        <td>{{ $row->user->name }}</td>                            
                                    @endif
                                    <td>
                                        <div class="file-info">
                                        <span class="document-link" onclick="openDocument('{{ asset('thesis_documents/' . $row->thesis_document) }}')">View Thesis</span>
        
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
                                    <td class="center-cell">
                                        <span class="document-link" onclick="openDocument('{{ asset('correction_forms/' . $row->correction_form) }}')">
                                            {{ $row->correction_form ? 'View Form' : '-' }}
                                        </span>
                                    </td>
                                    <td class="center-cell">
                                        <span class="document-link" onclick="openDocument('{{ asset('correction_summaries/' . $row->correction_summary) }}')">
                                            {{ $row->correction_summary ? 'View Summary' : '-' }}
                                        </span>
                                    </td>
                                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 3)
                                    <td>
                                        <?php
                                            // Retrieve the student record based on the user_id from the theses table
                                            $student = \App\Models\Student::where('user_id', $row->user_id)->first();

                                            if ($student) {
                                                // Retrieve supervisor IDs associated with the student from SupervisorAllocation table
                                                $supervisorIds = \App\Models\SupervisorAllocation::where('student_id', $student->id)->pluck('supervisor_id');

                                                if ($supervisorIds->isEmpty()) {
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

                                                    // Display the 'Send Reminder' button if user role is student (role_id == 1) and supervisor emails are not empty
                                                    if (auth()->user()->role_id == 1 && !empty($supervisorEmails)) {
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
                <p style="margin-top: 50px;">Currently, No Thesis has been  Submitted.</p>   
            @endif

            @if(auth()->user()->role_id == 1) 
                <a href="{{ route('thesis.submission') }}" class="btn btn-primary">Submit Thesis</a>
            @endif

        </x-layout>

        <script>
            function openDocument(pdfUrl) {
                // Display the PDF container
                document.getElementById('pdfContainer').style.display = 'flex'; 
                
                // Set the source of the iframe to the PDF URL
                document.getElementById('pdfViewer').src = pdfUrl;
            }

            function closeDocument() {
                // Hide the PDF container
                document.getElementById('pdfContainer').style.display = 'none';
                
                // Clear the source of the iframe
                document.getElementById('pdfViewer').src = '';
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
                
                document.getElementById('approveButton' + id).style.display = 'none';
                
                document.getElementById('approvalText' + id).style.display = 'inline';

            }
        </script>

    </body>
</html>

