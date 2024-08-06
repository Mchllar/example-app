<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
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

            .reminder{
                color: blue;
                font-style: italic;

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
            .document-link {
                cursor: pointer; 
            }

            .document-link.available {
                color: blue; 
                text-decoration: underline; 
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
                                @if(auth()->user()->role_id == 2 ) 
                                    <th>Student Number</th>
                                    <th>Student Name</th>
                                @else
                                    <th>ID</th>
                                @endif
                                <th>Thesis/Dissertation File</th>
                                <th>Submission Type</th>
                                <th>Submission Date</th>
                                <th>Correction Form</th>
                                <th>Correction Summary</th>
                                <th>Examination Report</th>
                                <th>Defense Minutes</th>
                                @if(auth()->user()->role_id == 2) 
                                    <th>Clearance</th>
                                @else
                                    <th>Supervisor Clearance</th>  
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($thesis as $thesis)
                                <tr>
                                    @if(auth()->user()->role_id == 1)
                                        <td>{{ $thesis['id'] }}</td>
                                    @elseif(auth()->user()->role_id == 2 )
                                        <td>{{ $thesis->student->student_number }}</td>                            
                                        <td>{{ $thesis->user->name }}</td>  
                                    @endif
                                    <td>
                                        <div class="file-info">
                                        <span class="document-link available" onclick="openDocument('{{ asset('thesis_documents/' . $thesis->thesis_document) }}')">View Thesis</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($thesis['submission_type'] == 1)
                                            Pre Defense
                                        @elseif ($thesis['submission_type'] == 2)
                                            Post Defense
                                        @else
                                            Unknown
                                        @endif
                                    </td>
                                    <td>{{ $thesis['updated_at'] }}</td> 
                                    <td class="center-cell">
                                    @if ($thesis->correction_form)
                                        <span class="document-link available" onclick="openDocument('{{ asset('correction_forms/' . $thesis->correction_form) }}')">View Form</span>
                                    @else
                                        -
                                    @endif
                                    </td>
                                    <td class="center-cell">
                                        @if ($thesis->correction_summary)
                                            <span class="document-link available" onclick="openDocument('{{ asset('correction_summaries/' . $thesis->correction_summary) }}')">View Summary</span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="center-cell">
                                        @if ($thesis->report)
                                            <span class="document-link available" onclick="openDocument('{{ asset('examination_reports/' . $thesis->report->report) }}')">
                                                View Report
                                            </span>
                                        @else
                                            - 
                                        @endif
                                    </td>
                                    <td class="center-cell">
                                        @if ($thesis->minutes)
                                            <span class="document-link available" onclick="openDocument('{{ asset('minutes/' . $thesis->minutes->minutes) }}')">
                                                View Minutes
                                            </span>
                                        @else
                                            - 
                                        @endif
                                    </td>
                                    @if(auth()->user()->role_id == 1)
                                    <td>
                                        <?php
                                            // Retrieve the student record based on the user_id from the theses table
                                            $student = \App\Models\Student::where('user_id', $thesis->user_id)->first();
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
                                                            ->where('submission_id', $thesis->id)
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
                                                        ?>
                                                        @if ($thesis->reminder)
                                                            @php
                                                                $lastReminderDate = \Carbon\Carbon::parse($thesis->reminder->created_at);
                                                                $now = \Carbon\Carbon::now();
                                                                $daysSinceLastReminder = $now->diffInDays($lastReminderDate);
                                                            @endphp
                                                                @if ($daysSinceLastReminder >= 2)
                                                                    <button id="sendReminderBtn" data-submission-id="{{ $thesis->id }}">Send Reminder</button>
                                                                @else
                                                                    <span style="color: red;">Please wait at least 2 days between reminders.</span>
                                                                @endif
                                                        @else
                                                            <!-- No reminder associated -->
                                                            <span style="color: green;">No reminder sent yet.</span>
                                                            <button id="sendReminderBtn" data-submission-id="{{ $thesis->id }}">Send Reminder</button>

                                                        @endif
                                                        <?php    
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
                                                                                    ->where('submission_id', $thesis['id'])
                                                                                    ->first();                                                                                  
                                            @endphp
                                            
                                            @if($approval)
                                                <span class="approval-text" style="color: green;">Approved</span>
                                            @else
                                                <div id="approvalContainer{{ $thesis['id'] }}" class="approval-container">
                                                    <form id="approvalForm{{ $thesis['id'] }}" action="{{ route('thesis.approve') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="submission_id" value="{{ $thesis['id'] }}">
                                                        <button id="approveButton{{ $thesis['id'] }}" class="approve-button" onclick="approveSubmission({{ $thesis['id'] }})">Approve</button>
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
                @php
                    $routeName = route('thesis.submission');
                @endphp
                <a href="#" class="btn btn-primary" onclick="confirmSubmit(event, '{{ $routeName }}')">Submit Thesis</a>
            @endif


        </x-layout>

        <script>
            function confirmSubmit(event, route) {
                event.preventDefault(); 
                
                if (confirm("NB: A new submission will replace the previously submitted record. Proceed with thesis submission?")) {
                    window.location.href = route; 
                } else {}
            }
        </script>


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
            document.addEventListener('DOMContentLoaded', function() {
                const sendReminderBtn = document.getElementById('sendReminderBtn');

                if (sendReminderBtn) {
                    sendReminderBtn.addEventListener('click', function() {
                        const submissionId = sendReminderBtn.getAttribute('data-submission-id');
                        const supervisorEmails = <?php echo json_encode($supervisorEmails ?? []); ?>;
                        const token = '{{ csrf_token() }}';

                        if (Array.isArray(supervisorEmails) && supervisorEmails.length > 0) {
                            const confirmation = confirm("Reminders will be sent to the following recipients:\n\n" + supervisorEmails.join('\n') + "\n\nContinue?");

                            if (confirmation) {
                                // Send AJAX POST request to send.reminder route
                                fetch('{{ route('send.reminder') }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': token
                                    },
                                    body: JSON.stringify({
                                        submission_id: submissionId,
                                        emails: supervisorEmails
                                    })
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Failed to send reminders');
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    alert(data.message); 
                                    window.location.reload(); 
                                })
                                .catch(error => {
                                    console.error('Error sending reminders:', error);
                                    alert('Failed to send reminders. Please try again.');
                                });
                            }
                        } else {
                            console.error("supervisorEmails is not an array or is empty");
                        }
                    });
                }
            });
        </script>

        <script>
            function uploadNewFile(id) {
                var form = document.getElementById('uploadForm' + id);
                var fileInput = form.querySelector('input[type="file"]');
                var file = fileInput.files[0];
                
                var formData = new FormData();
                formData.append('thesis_document', file);

                fetch(`/thesis/${id}`, {  
                    method: 'POST', 
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
                    
                    window.location.reload();

                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                   
                });
            }

        </script>  
        <script>
            function approveSubmission(id) {
                
                document.getElementById('approveButton' + id).style.display = 'none';
                
                document.getElementById('approvalText' + id).style.display = 'inline';

            }
        </script>

    </body>
