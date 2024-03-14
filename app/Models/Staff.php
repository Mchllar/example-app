<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculum_vitae', 
        'school_id',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function supervisorAllocations()
    {
        return $this->hasMany(SupervisorAllocation::class);
    }
}
