<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicLeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'address',
        'leave_start_date',
        'reason_for_leave',
        'return_date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
