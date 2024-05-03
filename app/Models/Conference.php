<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $fillable = [
        'conference_title',
        'title_of_paper',
        'status',
        'file_upload',
        'user_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id', 'user_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function notice(){
        return $this->belongsTo(Notice::class);
    }
    
    public function conferenceApproval()
    {
        return $this->hasOne(ConferenceApproval::class, 'submission_id', 'id');
    }


}
