<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApproval extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'ogs_date',
        'status',
    ];
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
