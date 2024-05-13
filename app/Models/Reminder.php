<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $table = 'reminders';
    
    protected $fillable = [
        'user_id',
        'submission_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thesis(){

        return $this->hasMany(Thesis::class);
    }

}
