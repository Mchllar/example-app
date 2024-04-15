<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThesisApproval extends Model
{
    protected $fillable = [
        
        'submission_id',
        'supervisor_id',
    ];

    public function submission(){

        return $this->belongsTo(Thesis::class);
    }

    public function user(){

        return $this->belongsTo(User::class); 
    }


}
