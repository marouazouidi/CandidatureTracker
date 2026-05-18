<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidature extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'company_name',
        'poste_title',
        'poste_url',
        'status',
        'priority',
        'notes',
        'date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function interviews(){
        return $this->hasMany(Interview::class);
    }


}
