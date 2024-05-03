<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Supervisor Request</title>
</head>
<body>
    <h1>Change Supervisor Request</h1>
    <p>Dear Office of Graduate Studies,</p>
    <p>A change supervisor request has been submitted.</p>
    
    <p><strong>Student ID:</strong> {{ $changeSupervisorRequest->student->user->name }}</p>
    <p><strong>Thesis Title:</strong> {{ $changeSupervisorRequest->thesis_title }}</p>
    <p><strong>Proposed Supervisor 1:</strong> {{ $changeSupervisorRequest->proposed_supervisor_1 }}</p>
    <p><strong>Proposed Supervisor 2:</strong> {{ $changeSupervisorRequest->proposed_supervisor_2 }}</p>
    <p><strong>Proposed Supervisor 3:</strong> {{ $changeSupervisorRequest->proposed_supervisor_3 }}</p>
    <p><strong>Effective Date:</strong> {{ $changeSupervisorRequest->effective_date }}</p>
    <p><strong>Reason for Change:</strong> {{ $changeSupervisorRequest->reason_for_change }}</p>
    
    <p>Please review the request <a href="{{ route('reviewChangeSupervisorRequests') }}">here</a>.</p>
    
    <p>Thank you.</p>
</body>
</html>
