<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'journal_title',
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
