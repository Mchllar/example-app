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
        'student_number',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
