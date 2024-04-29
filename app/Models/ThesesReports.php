<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThesesReports extends Model
{
    protected $fillable = [
        'submission_id', 
        'report', 

       ];

       protected $primaryKey = 'id'; 

        public function thesis()
        {
            return $this->belongsTo(Thesis::class, 'submission_id');
        }
}
