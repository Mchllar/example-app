<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'staff_id',
        'user_id',
        'reporting_period',
        'goals_set',
        'progress_report',
        'problems_issues',
        'agreed_goals',
        'progress_rating',
        'completion_rate',
        'thesis_completion_percentage',
        'completion_estimation',
        'problems_addressed',
        'concerns_about_student',
        'inadequate_aspects_comment',
        'progress_satisfactory',
        'registration_recommendation',
        'unsatisfactory_progress_comments',
        'student_date',
        'principal_date',
        'lead_date',
        'director_name',
        'director_date',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
