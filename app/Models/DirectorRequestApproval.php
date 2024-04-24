<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorRequestApproval extends Model
{
    use HasFactory;
    protected $fillable = ['change_supervisor_request_id','user_id', 'student_id', 'status'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
