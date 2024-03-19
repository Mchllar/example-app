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
        return $this->belongsTo(Student::class);
    }
    public function notice(){
        return $this->belongsTo(Notice::class);
    }
}
