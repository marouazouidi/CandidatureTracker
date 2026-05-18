<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = [
        'type',
        'interview_date',
        'interview_time',
        'preparation_notes',
        'result',
        'candidature_id',
    ];

    public function candidature(){
        return $this->belongsTo(Candidature::class);
    }
}
