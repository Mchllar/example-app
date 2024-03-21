<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSupervisor extends Model
{
    protected $table = 'student_supervisor';
    
    protected $fillable = [
        'student_id',
        'supervisor_id',
    ];

    // You can define any additional methods or relationships here if needed
}
