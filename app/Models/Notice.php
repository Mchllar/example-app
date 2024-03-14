<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'thesis_title',
        'proposed_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
