<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeSupervisorRequest extends Model
{
    use HasFactory;

    protected $table = 'change_supervisor_requests';

    protected $fillable = [
        'thesis_title',
        'proposed_supervisor_1',
        'proposed_supervisor_2',
        'proposed_supervisor_3',
        'effective_date',
        'reason_for_change',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
