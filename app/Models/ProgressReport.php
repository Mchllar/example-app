<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reporting_period',
        'goals_set',
        'progress_report',
        'problems_issues',
        'agreed_goals',
        'progress_rating',
        'seminars_presentations',
        'supervisor_comments',
        'director_comments',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
