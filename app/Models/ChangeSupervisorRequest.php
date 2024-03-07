<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangeSupervisorRequest extends Model
{
    protected $fillable = [
        'student_id',
        'title_of_thesis',
        'current_supervisor_1_id',
        'current_supervisor_2_id',
        'current_supervisor_3_id',
        'proposed_supervisor_1_id',
        'proposed_supervisor_2_id',
        'proposed_supervisor_3_id',
        'effective_date',
        'reason_for_change',
        'approved_by_school_graduate_studies',
        'approved_by_board_of_graduate_studies',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function currentSupervisor1()
    {
        return $this->belongsTo(User::class, 'current_supervisor_1_id');
    }

    // Define relationships with other supervisors similarly...
}
