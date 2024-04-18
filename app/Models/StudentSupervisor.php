<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class StudentSupervisor extends Pivot
{
    protected $table = 'student_supervisor';

    protected $fillable = [
        'student_id',
        'supervisor_id',
    ];

}
