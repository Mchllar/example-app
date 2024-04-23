@component('mail::message')
# Academic Leave Request Notification

Dear Student,

Your academic leave has been approved from


- **Leave Start Date:** {{ $academicLeaveRequest->leave_start_date }}
to
- **Return Date:** {{ $academicLeaveRequest->return_date }}


Regards
