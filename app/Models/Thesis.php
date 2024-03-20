<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{      protected $fillable = [
        'user_id', // Assuming you have a student_id to associate with the submission
        'thesis', // File path or URL to the thesis document
        'submission_type', // Submission type: pre_defense or post_defense
        //'supervisor1', 
        //'supervisor2', 
        //'supervisor3', 
        //'supervisor_verdict', 
        //'Reminder',
        'correction_form', // File path or URL to the correction form (for post-defense)
        'correction_summary', // File path or URL to the correction summary (for post-defense)
    ];

        // Define relationships if any
        public function user()
        {
            return $this->belongsTo(User::class);
        }
        
}
