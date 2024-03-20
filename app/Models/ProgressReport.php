<?php

// app/Models/ProgressReport.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressReport extends Model
{
    protected $fillable = [
        'student_id',
        'staff_id',
        'reporting_periods_id',
        'goals_set',
        'progress_report',
        'problems_issues',
        'agreed_goals',
        'students_progress_rating',
        'students_completion_rate',
        'thesis_completion_percentage',
        'completion_estimation',
        'problems_addressed',
        'concerns_about_student',
        'inadequate_aspects_comment',
        'dir_progress_satisfaction',
        'dir_registration_recommendation',
        'dir_unsatisfactory_progress_comments',
    ];

    // Define relationships
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function reportingPeriod()
    {
        return $this->belongsTo(ReportingPeriod::class, 'reporting_periods_id');
    }
}
