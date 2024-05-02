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
            button[type="button"] {
                display: block;
                margin: 20px auto; 
                padding: 6px 15px;
                background-color: green;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease; 
            }

            button[type="button"]:hover {
                background-color:#45a049; 
            }
            .custom-file-upload {
                display: inline-block;
                padding: 5px 5px;
                cursor: pointer;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
            }

            /* Visually hide the default file input */
            input[type="file"] {
                display: none;
            }
            button[type="submit"] {
                display: block;
                margin: 20px auto;
                padding: 6px 15px;
                background-color: blue;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease; 
            }

            button[type="submit"]:hover {
                background-color:green; 
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
                                <th>Student Name</th>
                                <th>ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $groupedThesis = $thesis->groupBy('user_id');
                            @endphp
                            @foreach ($groupedThesis as $userId => $theses)
                                @php
                                    $user = $theses->first()->user;
                                @endphp
                                <tr class="student-row">
                                    <td>
                                        <button class="toggle-details-btn" data-student-id="{{ $user->id }}">{{ $user->name }} ▶ </button>
                                    </td>
                                    <td>{{ $user->student->student_number }}</td>
                                </tr>
                                <tr class="details-row" id="details-{{ $user->id }}" style="display: none;">
                                    <td colspan="2">
                                        <strong>Thesis/Dissertation Details for {{ $user->name }}</strong><br>
                                        <table class="inner-table">
                                            <thead>
                                                <tr>
                                                    <th>Thesis/Dissertation File</th>
                                                    <th>Submission Type</th>
                                                    <th>Submission Date</th>
                                                    <th>Supervisors</th>
                                                    <th>Reports</th>
                                                    <th>Minutes</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($theses as $thesis)
                                                    <tr>
                                                        <td>
                                                            <div class="file-info">
                                                                <span class="document-link available" onclick="openDocument('{{ asset('thesis_documents/' . $thesis->thesis_document) }}')">View Thesis</span>
                                                            </div>
                                                        </td>
                                                        <td>{{ $thesis->submission_type == 1 ? 'Pre Defense' : ($thesis->submission_type == 2 ? 'Post Defense' : 'Unknown') }}</td>
                                                        <td>{{ $thesis->updated_at }}</td>
                                                        <td>
                                                            @if ($user->student && $user->student->supervisors->isEmpty())
                                                                <span style="color: red;">No supervisor assigned</span>
                                                            @else
                                                                @foreach ($user->student->supervisors as $supervisor)
                                                                    {{ $supervisor->name }} ({{ $supervisor->pivot->approved ? 'Approved' : 'Not Approved' }})<br>
                                                                @endforeach
                                                                @if (auth()->user()->role_id == 1 && !$user->student->supervisors->isEmpty())
                                                                    <button class="send-reminder-btn">Send Reminder</button>
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($thesis->report)
                                                                <div class="file-info">
                                                                    <span class="document-link available" onclick="openDocument('{{ asset('examination_reports/' . $thesis->report->report) }}')">View Report</span>
                                                                </div>
                                                            @else
                                                                <button type="button" onclick="document.getElementById('reports{{ $thesis->id }}').click();">
                                                                    Upload Report
                                                                </button>                                     
                                                                <form id="uploadForm{{ $thesis->id }}" style="display: none;" method="POST" action="{{ route('admin.submit-reports-and-minutes', ['thesis' => $thesis->id]) }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="file" id="reports{{ $thesis->id }}" name="report" required accept=".pdf"><br>
                                                                </form>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($thesis->minutes)
                                                                <div class="file-info">
                                                                    <span class="document-link available" onclick="openDocument('{{ asset('minutes/' . $thesis->minutes->minutes) }}')">View Minutes</span>
                                                                </div>
                                                            @else
                                                                <button type="button" onclick="document.getElementById('uploadMinutes{{ $thesis->id }}').click();">
                                                                    Upload Minutes
                                                                </button> 
                                                                <form id="uploadFormMinutes{{ $thesis->id }}" style="display: none;" method="POST" action="{{ route('admin.submit-reports-and-minutes', ['thesis' => $thesis->id]) }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="file" id="uploadMinutes{{ $thesis->id }}" name="minutes" required accept=".pdf"><br>                                     
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p style="margin-top: 50px;">Currently, No Thesis has been submitted.</p>   
            @endif

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const toggleButtons = document.querySelectorAll('.toggle-details-btn');
                    toggleButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            const studentId = button.getAttribute('data-student-id');
                            const detailsRow = document.getElementById(`details-${studentId}`);
                            if (detailsRow) {
                                detailsRow.style.display = detailsRow.style.display === 'none' ? 'table-row' : 'none';
                            }
                        });
                    });
                });
            </script>
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
            function showUploadForm1() {
                var form = document.getElementById('uploadForm1');
                form.style.display = 'block';
            }
        
        </script>
        <script>
                function showUploadForm2() {
                var form = document.getElementById('uploadForm2');
                form.style.display = 'block';
            }
            </script>
    </body>
</html>

