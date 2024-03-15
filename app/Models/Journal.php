<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'journal_title',
        'title_of_paper',
        'status',
        'file_upload',
        //'approved_by_director_graduate_studies',
       // 'approved_by_principal_supervisor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
