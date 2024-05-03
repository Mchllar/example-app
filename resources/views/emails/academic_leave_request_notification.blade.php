<h1 style="color: black;">Academic Leave Request Notification</h1>

<p style="color: black;">
    Dear Staff,

    A student has sent an academic leave request. Below are the details:
    <ul>
        <li>Student Name: {{ $academicLeaveRequest->student->user->name }}</li>
        <li>Leave Start Date: {{ $academicLeaveRequest->leave_start_date }}</li>
        <li>Return Date: {{ $academicLeaveRequest->return_date }}</li>
        <li>Reason for Leave: {{ $academicLeaveRequest->reason_for_leave }}</li>
    </ul>
    You can view the request by clicking the button below:

    @component('mail::button', ['url' => route('academic_leave.view')])
    View Request
    @endcomponent

    Thanks,<br>
    {{ $academicLeaveRequest->student->user->name }} SGS
</p>
