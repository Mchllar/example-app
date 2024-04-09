<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThesisStatus extends Model
{
    protected $fillable = [
        
        'submission_id',
        'status',
    ];

    public function submission(){

        return $this->belongsTo(Thesis::class);
    }

    public function user(){

        return $this->belongsTo(User::class); 
    }

    public function approval(){

        return $this->belongsTo(ThesisApproval::class);
    }
}
