<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- External CSS -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container {
            margin: 20px auto; /* Apply margin to the container and center it horizontally */
            width: 80%; /* Adjust width as needed */
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
            /*background-color: #f2f2f2;*/
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
        
        p {
            text-align: center;
            font-size: 25px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
<x-layout>
    @if (isset($supervisorAllocations) && !$supervisorAllocations->isEmpty())
        <p>List of Supervisees</p>

        <div class="table-container">   
            <table>
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Thesis Title</th>
                        <th>Program Name</th>
                        <th>Academic Status</th>
                        <th>Thesis Submission Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($supervisorAllocations as $allocation)
                    <tr>
                        <td>{{ $allocation->student->student_number }}</td>
                        <td>{{ $allocation->student->user->name }}</td>
                        <td>{{ $allocation->student->user->email }}</td>
                        @foreach ($allocation->student->notices as $notice)
                            <td>{{ $notice->thesis_title }}</td>
                        @endforeach
                        <td>{{ $allocation->student->program->name }}</td>
                        <td>{{ $allocation->student->academic_status }}</td>
                        <td>
                            @php
                                $submissionStatuses = [];

                                // Find all thesis submissions for the student
                                $submissions = $theses->where('user_id', $allocation->student->user_id);

                                if ($submissions->isNotEmpty()) {
                                    foreach ($submissions as $submission) {
                                        $submissionStatus = 'Submitted';

                                        // Determine the submission type name based on submission type value
                                        switch ($submission->submission_type) {
                                            case 1:
                                                $submissionTypeName = 'Pre Defense';
                                                break;
                                            case 2:
                                                $submissionTypeName = 'Post Defense';
                                                break;
                                            default:
                                                $submissionTypeName = 'Unknown';
                                                break;
                                        }

                                        // Check if the submission is approved by the supervisor
                                        $isApproved = App\Models\ThesisApproval::where('submission_id', $submission->id)
                                                                                ->where('supervisor_id', $allocation->supervisor_id)
                                                                                ->exists();

                                        $approvalStatus = $isApproved ? 'Approved' : 'Not Approved';

                                        // Build submission status string
                                        $status = "{$submissionTypeName} - {$submissionStatus} (";
                                        if ($approvalStatus === 'Not Approved') {
                                            $status .= "<a href=\"" . route('thesis.index') . "\" style=\"color: red; text-decoration: underline;\">{$approvalStatus}</a>";
                                        } else {
                                            $status .= "<span style=\"color: green;\">{$approvalStatus}</span>";
                                        }
                                        $status .= ")";

                                        $submissionStatuses[] = $status;
                                    }
                                } else {
                                    $submissionStatuses[] = 'Not Submitted';
                                }
                            @endphp

                            @foreach ($submissionStatuses as $status)
                                {!! $status !!}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    @else 
        <p>You currently have no Assigned Supervisees</p>
    @endif
</x-layout>

</body>