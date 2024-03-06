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
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'role',
        'otp_code',
        'student_number', // For Student role
        'phone_number', // For Student role
        'date_of_birth', // For Student role
        'gender', // For Student role
        'nationality', // For Student role
        'religion', // For Student role
        'school', // For Student role
        'programme', // For Student role
        'intake', // For Student role
        'previous_school', // For Student role
        'status', // For Student role
        'curriculum_vitae', // For Supervisor role
        'contract', // For Supervisor role
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
}


//'profile',