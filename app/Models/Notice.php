<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'thesis_title',
        'proposed_date',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function journals(){
        return $this->hasMany(Journal::class);
    }

    public function conferences(){
        return $this->belongsTo(Conference::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id', 'user_id');
    }

    public function thesis()
    {
        return $this->belongsTo(Thesis::class, 'user_id', 'user_id');
    }

}
