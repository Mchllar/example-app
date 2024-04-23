@component('mail::message')
# Academic Leave Request Notification

Dear Staff,

A student has sent an academic leave request. Below are the details:

- **Student Name:** {{ $academicLeaveRequest->student->user->name }}
- **Leave Start Date:** {{ $academicLeaveRequest->leave_start_date }}
- **Return Date:** {{ $academicLeaveRequest->return_date }}
- **Reason for Leave:** {{ $academicLeaveRequest->reason_for_leave }}

You can view the request by clicking the button below:

@component('mail::button', ['url' => route('academic_leave.view')])
View Request
@endcomponent

Thanks,<br>
{{ $academicLeaveRequest->student->user->name }}
@endcomponent
