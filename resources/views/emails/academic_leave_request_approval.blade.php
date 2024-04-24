@component('mail::message')
<h2>Academic Leave Request Notification</h2>

<p>Dear Student,

Your academic leave has been approved from


Leave Start Date:{{ $academicLeaveRequest->leave_start_date }}
to
Return Date:{{ $academicLeaveRequest->return_date }}
Regards<p>