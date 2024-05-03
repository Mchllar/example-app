<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceApproval extends Model
{
    protected $fillable = [
        
        'submission_id',
        'admin_id',
    ];

    public function submission(){

        return $this->belongsTo(Conference::class, 'submission_id', 'id');
    }

    public function user(){

        return $this->belongsTo(User::class); 
    }


}
