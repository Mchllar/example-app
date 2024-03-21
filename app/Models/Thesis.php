<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{      protected $fillable = [
        'user_id', 
        'submission_type', 
        'thesis_document', 
        'correction_form', 
        'correction_summary'
        //'supervisor1', 
        //'supervisor2', 
        //'supervisor3', 
        //'supervisor_verdict', 
        //'Reminder',
       ];

        public function student()
        {
            return $this->belongsTo(Student::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }
        
}



