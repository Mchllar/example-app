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


    public function supervisorAllocations()
    {
        return $this->hasMany(SupervisorAllocation::class, 'student_id');
    }
    public function journal()
    {
        return $this->hasMany(Journal::class);

    }

    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }

    public function supervisors()
    {
        return $this->belongsToMany(User::class, 'student_supervisor', 'student_id', 'supervisor_id');
    }

    public function allSupervisors()
    {
        return $this->belongsToMany(User::class, 'role_user')->where('role_id', 'supervisor');
    }

    public function thesis()
    {
        return $this->belongsTo(Thesis::class);
    }

    public function conferenceApproval()
    {
        return $this->hasMany(ConferenceApproval::class);
    }

    public function journalApproval()
    {
        return $this->hasMany(JournalApproval::class);
    }
}
