<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrarLeaveApproval extends Model
{
    use HasFactory;
    protected $fillable = [
        'academic_leave_request_id',
        'user_id',
        'ogs_approval_date',
        'status',
    ];
    public function academicLeaveRequest()
    {
        return $this->belongsTo(AcademicLeaveRequest::class);
    }
}
