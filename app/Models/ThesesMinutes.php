<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThesesMinutes extends Model
{
    protected $fillable = [
        'submission_id', 
        'minutes', 

       ];

        public function thesis()
        {
            return $this->belongsTo(Thesis::class, 'submission_id');
        }
}
