<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisorAllocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id', 
        'start_date', 
        'end_date', 
        'notes', 
        'contract', 
        'student_id',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}