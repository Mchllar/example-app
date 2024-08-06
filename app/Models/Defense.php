<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defense extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional, if the default table name is not used)
    protected $table = 'defense';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'Defense Decision',
        'Comments',
        'Defense Date',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id', 'user_id');
    }
    
}
