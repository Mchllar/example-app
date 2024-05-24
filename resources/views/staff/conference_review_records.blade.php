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
            <div class="main-content">  
                @if (auth()->user()->role_id == 3)
                    @if (isset($reviews) && !$reviews->isEmpty())
                        <p>List of Conference Review Criteria</p>
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>Student Number</th>
                                    <th>Student Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $groupedReviews = $reviews->groupBy('student_id');
                                @endphp
                                @foreach ($groupedReviews as $studentId => $studentReview)
                                    @php
                                        $student = $studentReview->first()->student;
                                    @endphp
                                    <tr class="student-row">
                                        <td>{{ $student->student_number }}</td>
                                        <td>{{ $student->user->name }}</td>
                                    </tr>
                            </tbody>
                                <table class="hidden" id="submissions-{{ $student->id }}">
                                    <thead>
                                        <tr>
                                            <th>Student Number</th>
                                            <th>Student Name</th>
                                            <th>Document</th>
                                            <th>Comments</th>
                                            <th>Submission Date</th>
                                            <th>Admin Clearance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($studentReview as $review)
                                            <tr>
                                                <td>{{ $review->student->student_number }}</td>
                                                <td>{{ $review->student->user->name }}</td>
                                                <td>
                                                    <span class="document-link" onclick="openDocument('{{ asset('conference_reviews/' . $review->file_upload) }}')">View Document</span>
                                                </td>
                                                <td>{{ $review->comments }}</td>
                                                <td>{{ $review->updated_at }}</td>
                                                <td>
                                                    @php
                                                        $approval = \App\Models\ConferenceReviewApproval::where('admin_id', auth()->user()->id)
                                                                                        ->where('criteria_id', $review->id)
                                                                                        ->first();
                                                    @endphp
                                                    
                                                    @if($approval)
                                                        <span class="approval-text" style="color: green;">Approved</span>
                                                    @else
                                                        <div id="approvalContainer{{ $review->id }}" class="approval-container">
                                                            <form id="approvalForm{{ $review->id }}" action="{{ route('criteria.approval') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="criteria_id" value="{{ $review->id }}">
                                                                <button id="approveButton{{ $review->id }}" class="approve-button" onclick="approveSubmission({{ $review->id }})">Approve</button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endforeach
                                </table>    
                        </table>
                        <button id="toggleButton-{{ $student->id }}" onclick="toggleSubmissions({{ $student->id }})" class="custom-button-text">View Submissions</button>
                    @else
                        <p>Currently no Reviews have been Submitted.</p>
                    @endif
                @else
                    @if (isset($reviews) && !$reviews->isEmpty())
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>Document</th>
                                    <th>Comments</th>
                                    <th>Submission Date</th>
                                    <th>Admin Clearance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>
                                            <span class="document-link" onclick="openDocument('{{ asset('conference_reviews/' . $review->file_upload) }}')">View Document</span>
                                        </td>
                                        <td>{{ $review->comments }}</td>
                                        <td>{{ $review->updated_at }}</td>
                                        <td>
                                            @php
                                                $approval = \App\Models\ConferenceReviewApproval::where('criteria_id', $review->id)
                                                                                            ->exists();
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
                        <p>You have not submitted any Document for Review.</p>
                    @endif
                    <a href="{{ route('conference.review') }}" class="btn btn-primary">Submit New Document</a>
                @endif
            </div>
        </x-layout>

        <script>
            function toggleSubmissions(studentId) {
                var reviewsTable = document.getElementById("submissions-" + studentId);
                var button = document.getElementById("toggleButton-" + studentId);

                // Toggle the visibility of the submission section
                reviewsTable.classList.toggle("hidden");

                // Toggle the button text between "View Submissions" and "Minimize"
                if (button.textContent === 'View Submissions') {
                    button.textContent = 'Minimize';
                } else {
                    button.textContent = 'View Submissions';
                }
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
            function approveSubmission(id) {
                
                document.getElementById('approveButton' + id).style.display = 'none';
                
                document.getElementById('approvalText' + id).style.display = 'inline';

            }
        </script>
    </body>
</html>