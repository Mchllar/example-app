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
                width: 80%;
                border-collapse: collapse;
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
            }

            th {
                background-color: #f2f2f2;
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            td {
                border: 1px solid #ddd;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #ddd;
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
                background-color: blue;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease; 
            }

            button[type="button"]:hover {
                background-color:green; 
            }

            input[type="submit"] {
            width: 100%;
            padding: 5px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #45a049;
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

            input[type="file"] {
                display: none;
            }
            .upload-button {
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

            .upload-button:hover {
                background-color: #4CAF50; 
            }
            .document-link {
                cursor: pointer; 
            }

            .document-link.available {
                color: blue; 
                text-decoration: underline; 
            }
            .custom-button-text {
                color: blue; 
                margin-left: 10%; 
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
            <div class="main content">
                @if (isset($thesis) && !$thesis->isEmpty())
                    <p>List of Thesis/Dissertation Documents</p>
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>Student Number</th>
                                    <th>Student Name</th>
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
                                        <td>{{ $user->student->student_number }}</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                            </tbody>
                                <table class="hidden" id="submissions-{{ $user->id }}">
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
                                                    <form id="uploadForm{{ $thesis->id }}" action="{{ route('admin.submit-reports', ['thesis' => $thesis->id]) }}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <!-- File input field (hidden by default) -->
                                                        <input type="file" id="reportInput{{ $thesis->id }}" name="report" style="display: none;" onchange="handleReportSelect(this)">

                                                        <!-- Button to trigger file input -->
                                                        <button type="button" onclick="document.getElementById('reportInput{{ $thesis->id }}').click();">
                                                            Choose Report
                                                        </button>

                                                        <!-- Placeholder for displaying selected file name -->
                                                        <span id="selectedReportName{{ $thesis->id }}"></span>

                                                        <!-- Submit button (initially hidden) -->
                                                        <input type="submit" id="submitReportButton{{ $thesis->id }}" style="display: none;">
                                                    </form>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($thesis->minutes)
                                                        <div class="file-info">
                                                            <span class="document-link available" onclick="openDocument('{{ asset('minutes/' . $thesis->minutes->minutes) }}')">View Minutes</span>
                                                        </div>
                                                    @else
                                                    <form id="uploadForm{{ $thesis->id }}" action="{{ route('admin.submit-minutes', ['thesis' => $thesis->id]) }}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <!-- File input field (hidden by default) -->
                                                        <input type="file" id="minutesInput{{ $thesis->id }}" name="minutes" style="display: none;" onchange="handleFileSelect(this)">

                                                        <!-- Button to trigger file input -->
                                                        <button type="button" onclick="document.getElementById('minutesInput{{ $thesis->id }}').click();">
                                                            Choose File
                                                        </button>

                                                        <!-- Placeholder for displaying selected file name -->
                                                        <span id="selectedFileName{{ $thesis->id }}"></span>

                                                        <!-- Submit button (initially hidden) -->
                                                        <input type="submit" id="submitButton{{ $thesis->id }}" style="display: none;">
                                                    </form>

                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </table>
                    @endforeach
                    <button  id="toggleButton-{{ $userId }}" onclick="toggleSubmissions({{ $userId }})" class="custom-button-text">View Submissions</button>
                @else
                    <p style="margin-top: 50px;">Currently, No Thesis has been submitted.</p>   
                @endif
            </div>
        </x-layout>

        <script>
            // Function to handle report selection
            function handleReportSelect(input) {
                // Get the submit button and selected report name elements
                var submitButton = document.getElementById('submitReportButton{{ $thesis->id }}');
                var reportNameSpan = document.getElementById('selectedReportName{{ $thesis->id }}');

                // Display the submit button if a report has been selected
                if (input.files && input.files[0]) {
                    submitButton.style.display = 'inline-block'; // Show the submit button

                    // Display the selected report name
                    reportNameSpan.textContent = input.files[0].name;
                } else {
                    submitButton.style.display = 'none'; // Hide the submit button if no report selected
                    reportNameSpan.textContent = ''; // Clear the displayed report name
                }
            }
        </script>

        <script>
        // Function to handle file selection
        function handleFileSelect(input) {
            // Get the submit button and selected file name elements
            var submitButton = document.getElementById('submitButton{{ $thesis->id }}');
            var fileNameSpan = document.getElementById('selectedFileName{{ $thesis->id }}');

            // Display the submit button if a file has been selected
            if (input.files && input.files[0]) {
                submitButton.style.display = 'inline-block'; // Show the submit button

                // Display the selected file name
                fileNameSpan.textContent = input.files[0].name;
            } else {
                submitButton.style.display = 'none'; // Hide the submit button if no file selected
                fileNameSpan.textContent = ''; // Clear the displayed file name
            }
        }
    </script>


        <script>
    function toggleSubmissions(userId) {
        var submission = document.getElementById("submissions-" + userId);
        var button = document.getElementById("toggleButton-" + userId);

        // Toggle the visibility of the submission section
        submission.classList.toggle("hidden");

        // Toggle the button text between "View Submissions" and "Minimize"
        if (button.textContent === 'View Submissions') {
            button.textContent = 'Minimize';
        } else {
            button.textContent = 'View Submissions';
        }
    }
</script>

        </script>

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

