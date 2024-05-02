<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            p {
                text-align: justify;
                font-size: 16px;
                line-height: 1.5;
            }
            .main-content {
                flex: 3;
                padding: 20px;
            }

            /* Table styles */
            table {
                width: 80%;
                border-collapse: collapse;
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
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
                padding: 4px 8px;
                background-color: #4CAF50;
                color: white;
                border-radius: 5px;
                width: 14%; 
                cursor: pointer;
                margin-top: 20px; 
                font-family: Arial, sans-serif;
                display: block; 
                text-align: center;

            }

            .btn:hover {
                background-color: #45a049;
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
            p {
            text-align: center;
            font-size: 25px;
            line-height: 1.5;
            }

            .document-link {
                color: blue;           
                text-decoration: underline;  
                cursor: pointer;       
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

        </style>
    </head>
    <body>
        <div id="pdfContainer">
            <button onclick="closeDocument()">Close</button>
            <iframe id="pdfViewer" frameborder="0"></iframe>
        </div>

        <x-layout>
    <div class="main-content">
        @if (auth()->user()->role_id == 3)
            @if (isset($journals) && !$journals->isEmpty())
                <p>List of All Journal Articles</p>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Student Number</th>
                            <th>Student Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $groupedJournals = $journals->groupBy('student_id');
                        @endphp
                        @foreach ($groupedJournals as $studentId => $studentJournals)
                            @php
                                $student = $studentJournals->first()->student;
                            @endphp
                            <tr class="student-row">
                                <td>{{ $student->student_number }}</td>
                                <td>{{ $student->user->name }}</td>
                                <td>
                                    <button class="toggle-details-btn" data-student-id="{{ $student->id }}">▶ Show Submissions</button>
                                </td>
                            </tr>
                            <tr class="details-row" id="details-{{ $student->id }}" style="display: none;">
                                <td colspan="3">
                                    <table class="inner-table">
                                        <thead>
                                            <tr>
                                                <th>Journal Title</th>
                                                <th>Title of Paper</th>
                                                <th>Status</th>
                                                <th>File</th>
                                                <th>Submission Date</th>
                                                <th>Clearance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($studentJournals as $journal)
                                                <tr>
                                                    <td>{{ $journal->journal_title }}</td>
                                                    <td>{{ $journal->title_of_paper }}</td>
                                                    <td>{{ $journal->status }}</td>
                                                    <td>
                                                        <span class="document-link" onclick="openDocument('{{ asset('journal_publications/' . $journal->file_upload) }}')">View Publication</span>
                                                    </td>
                                                    <td>{{ $journal->created_at }}</td>
                                                    <td>
                                                        @php
                                                            // Check if a record exists in the journal approvals table for the current submission and admin
                                                            $approval = \App\Models\JournalApproval::where('submission_id', $journal['id'])
                                                                                                ->first();
                                                        @endphp
                                                        
                                                        @if($approval)
                                                            <span class="approval-text" style="color: green;">Approved</span>
                                                        @else
                                                            <div id="approvalContainer{{ $journal['id'] }}" class="approval-container">
                                                                <form id="approvalForm{{ $journal['id'] }}" action="{{ route('journal.approval') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="submission_id" value="{{ $journal['id'] }}">
                                                                    <button id="approveButton{{ $journal['id'] }}" class="approve-button" onclick="approveSubmission({{ $journal['id'] }})">Approve</button>
                                                                </form>
                                                            </div>
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
            @else
                <p>No Journal Publications have been submitted.</p>
            @endif
        @else
            <p><i>PUBLICATIONS/CONFERENCE PAPERS: (Please note the status of the following. Please note that without having a total of 3 papers as clarified in the PhD regulations, you are not eligible to graduate)</i></p>

            @if (isset($journals) && !$journals->isEmpty())
                <p>List of Your Journal Articles:</p>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Journal Title</th>
                            <th>Title of Paper</th>
                            <th>Status</th>
                            <th>File</th>
                            <th>Submission Date</th>
                            <th>Admin Clearance</th>  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($journals as $journal)
                            <tr>
                                <td>{{ $journal->journal_title }}</td>
                                <td>{{ $journal->title_of_paper }}</td>
                                <td>{{ $journal->status }}</td>
                                <td>
                                    <span class="document-link" onclick="openDocument('{{ asset('journal_publications/' . $journal->file_upload) }}')">View Publication</span>
                                </td>
                                <td>{{ $journal->created_at }}</td>
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
                <p>You currently have no Journal Articles.</p>
            @endif
            <a href="{{ route('journalSubmission') }}" class="btn btn-primary">Submit Journal Article</a>
        @endif
    </div>

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
    </body>
</html>