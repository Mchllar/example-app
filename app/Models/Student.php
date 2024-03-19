<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_number',
        'academic_status', 
        'program_id', 
        'start_date', 
        'end_date', 
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

<<<<<<< HEAD
    public function supervisorAllocation()
    {
        return $this->hasOne(SupervisorAllocation::class);
=======
    public function journal()
    {
        return $this->hasMany(Journal::class);
>>>>>>> a2be6464302874da1a65c94213281d6bb41beaa7
    }

    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }
}
