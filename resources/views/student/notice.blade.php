<x-layout>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h3{
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="date"],
        input[type="text"],
        select {
            width: 100%;
            padding: 6px 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: blue;
        }

        p {
            text-align: justify;
            font-size: 16px;
            line-height: 1.5;
        }

        .form-container {
            width: 50%;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #f2f2f2; /* Gray background color */
        }

        label span {
        color: blue; 
        }

        .upload-button, .btn {
        display: inline-block;
        padding: 8px 10px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 2px;
        transition: background-color 0.3s;
        }

        .upload-button:hover, .btn:hover {
            background-color: blue
        }

        .document-link:hover {
            cursor: pointer;
            color: green; 
        }
        .document-link {
                color: blue;           
                text-decoration: underline;  
                cursor: pointer;       
            }
    </style>
</head>
<body>

    <h2 style="text-align: center; font-size: 20px; ">NOTICE OF INTENTION TO SUBMIT THESIS</h2>
    <div class="form-container">
        <h3 style="text-align: center; ">Section A:</h3>

    <form action="{{ route('notice.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <th>Title of Thesis</th>
                <td><input type="text" name="thesis_title" id="thesis_title"></td>
            </tr>
            <tr>
                <th>Date intended to submit thesis</th>
                <td><input type="date" name="proposed_date" id="proposed_date"></td>
            </tr>
        </table>

    <h3>Section B</h3>
    <h3 style="text-align: justify;">DECLARATION <br></h3>
    <p>
        The work to be submitted has not previously been accepted in substance for any degree 
        and is not concurrently submitted in candidature for any degree. This thesis is the result 
        of my own independent work/investigation, except where otherwise stated. Other 
        sources are acknowledged by explicit references.
    </p>

    <!-- Add a checkbox for the user to affirm the declaration -->
    <label for="declaration_checkbox">
        <input type="checkbox" id="declaration_checkbox" name="declaration_checkbox" required>
        <span style="color: blue;">I affirm the declaration above.</span>
    </label>

    <span id="error_message" style="color: red; display: none;">Please affirm the declaration.</span>
    <span id="success_message" style="color: green; display: none;">Form submitted successfully!</span>

    <input type="submit" value="Submit" onclick="validateForm()">


    <script>
        function validateForm() {
            var checkbox = document.getElementById("declaration_checkbox");
            var errorMessage = document.getElementById("error_message");
            var successMessage = document.getElementById("success_message");
            
            if (!checkbox.checked) {
                errorMessage.style.display = "inline"; // Show error message
                setTimeout(function(){ errorMessage.style.display = "none"; }, 3000); // Hide error message after 3 seconds
                return false; // Prevent form submission
            }
        }
    </script>

    </form>


    <p><i>PUBLICATIONS/CONFERENCE PAPERS: (Please note the status of the following. Please note that without having a total of 3 papers as clarified in the PhD regulations, you are not eligible to graduate)</i></p>
    </br>
    
    @if (isset($journals) && !$journals->isEmpty())
            <p style='text-align: center; text-decoration: underline;'>List of your Journal Articles </p>
            <table>
                <thead>
                    <tr>
                        <th>Journal Title</th>
                        <th>Title of Paper</th>
                        <th>Status</th>
                        <th>File</th>
                        <th>Admin Clearance</th>  
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($journals as $journal)
                        <tr>
                            <td>{{ $journal['journal_title'] }}</td>
                            <td>{{ $journal['title_of_paper'] }}</td>
                            <td>{{ $journal['status'] }}</td>
                            <td>
                            <span class="document-link" onclick="openDocument('{{ asset('journal_publications/' . $journal->file_upload) }}')">View Publication</span>
                            </td>
                            <td>
                                @php
                                    $approval = \App\Models\JournalApproval::where('submission_id', $journal->id)->first();
                                @endphp

                                @if($approval)
                                    <span class="approval-text" style="color: green;">Approved</span>
                                @else
                                    <span class="approval-text" style="color: red;">Not Approved</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p> You currently have no Journal Articles</p>
        @endif
        <a href="{{ route('journalSubmission') }}" class="btn btn-primary">Submit New Journal Article</a>
        

    </br>

    @if (isset($conferences) && !$conferences->isEmpty())
        <p style='text-align: center; text-decoration: underline;'>List of your Conference Articles</p>
            <table>
                <thead> 
                    <tr>          
                        <th>Conference Title & Website</th>
                        <th>Title of Paper Presentation</th>
                        <th>Status of Paper</th>
                        <th>File</th> 
                        <th>Admin Clearance</th>  
    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($conferences as $conference)
                        <tr>
                            <td>{{ $conference['conference_title'] }}</td>
                            <td>{{ $conference['title_of_paper'] }}</td>
                            <td>{{ $conference['status'] }}</td>
                            <td>
                            <span class="document-link" onclick="openDocument('{{ asset('conference_publications/' . $conference->file_upload) }}')">View Publication</span>
                            </td>
                            <td>
                                @php
                                    $approval = \App\Models\ConferenceApproval::where('submission_id', $conference->id)->first();
                                @endphp

                                @if($approval)
                                    <span class="approval-text" style="color: green;">Approved</span>
                                @else
                                    <span class="approval-text" style="color: red;">Not Approved</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach  
                </tbody>
            </table>
        @else
            <p> You currently have no Conference Articles</p>   
        @endif
        <a href="{{ route('conferenceSubmission') }}" class="btn btn-primary">Submit New Conference Paper</a>
        </div>
    </body>
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
