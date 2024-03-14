<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
      protected $fillable = [
        'student_id', // Assuming you have a student_id to associate with the submission
        'thesis_document', // File path or URL to the thesis document
        'Upload_date',
        'submission_type', // Submission type: pre_defense or post_defense
        'supervisor1_name', 
        'supervisor2_name', 
        'supervisor3_name', 
        'supervisor_verdict', 
        'Reminder',
        'correction_form', // File path or URL to the correction form (for post-defense)
        'correction_summary', // File path or URL to the correction summary (for post-defense)
    ];

        // Define relationships if any
        public function student()
        {
            return $this->belongsTo(User::class, 'student_id');
        }
        
        public function supervisor1()
        {
            return $this->belongsTo(User::class, 'supervisor1_name');
        }
    
        public function supervisor2()
        {
            return $this->belongsTo(User::class, 'supervisor2_name');
        }
    
        public function supervisor3()
        {
            return $this->belongsTo(User::class, 'supervisor3_name');
        }
}
