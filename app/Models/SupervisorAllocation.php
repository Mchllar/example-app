<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupervisorAllocation extends Model
{
    protected $fillable = [
        'staff_id',
        'start_date',
        'end_date',
        'notes',
        'contract',
        'student_id',
        'supervisor_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
