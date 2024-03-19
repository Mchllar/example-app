<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'conference_reviews';
    protected $fillable = [
        'file_upload',
        'comments',
        'user_id',
    ];

    public function review()
    {
        return $this->belongsTo(User::class);
    }

}
