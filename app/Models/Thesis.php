<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{      protected $fillable = [
        'user_id', 
        'submission_type', 
        'thesis_document', 

       ];

        public function student()
        {
            return $this->belongsTo(Student::class, 'user_id', 'user_id');
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function approvals(){

            return $this->belongsTo(ThesisApprovals::class);
        }
        
        public function minutes(){

            return $this->hasOne(ThesesMinutes::class, 'submission_id');
        }

        public function report(){

            return $this->hasOne(ThesesReports::class, 'submission_id');
        }

        public function reminder()
        {
            return $this->hasOne(Reminder::class, 'submission_id', 'id');
        }

        public function notices()
        {
            return $this->hasOne(Notice::class, 'user_id', 'user_id');
        }
        
}



