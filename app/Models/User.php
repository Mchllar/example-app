<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile', 
        'role_id', 
        'phone_number', 
        'date_of_birth', 
        'country_id', 
        'religion_id', 
        'gender_id', 
        'status',
        'otp_code',
        'otp_created_at',
        'reset_token',
        'reset_token_expiry',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'otp_code',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'otp_code' => 'string',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }

    public function conferences()
    {
        return $this->belongsTo(Conference::class);
    }

    public function notice()
    {

        return $this->hasMany(Notice::class);
    }

    public function review()
    {

        return $this->belongsTo(Review::class);
    }

    public function thesis()
    {
        return $this->belongTo(Thesis::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_supervisor', 'supervisor_id', 'student_id');
    }

    public function approvals(){
            
        return $this->belongsTo(ThesisApproval::class);
    }

    public function supervisorAllocations()
    {
        return $this->hasMany(SupervisorAllocation::class, 'supervisor_id');
    }

    public function conferenceApproval()
    {
        return $this->belongsTo(ConferenceApproval::class);

    }
    public function journalApproval()
    {
        return $this->belongsTo(JournalApproval::class);

    }
    public function conferenceReview()
    {
        return $this->belongsTo(ConferenceReviewApproval::class);

    }
    public function correctionReminder()
    {
        return $this->belongsTo(correctionReminder::class);
    }
    public function school()
{
    return $this->belongsTo(School::class);
}



}