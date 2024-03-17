<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicLeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'staff_id',
        'user_id',
        'address',
        'leave_date',
        'leave_month',
        'leave_year',
        'reason_for_leave',
        'return_date',
        'ogs_date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
