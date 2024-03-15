<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $fillable = [
        'conference_title',
        'title_of_paper',
        'status',
        'file_upload',
        //'approved_by_director_graduate_studies',
       //'approved_by_principal_supervisor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
