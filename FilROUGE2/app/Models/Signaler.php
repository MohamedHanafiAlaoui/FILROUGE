<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signaler extends Model
{
    
    protected $table = 'signalers';

    protected $fillable = [
        'image',
        'name',
        'id_culture',
        'description',
    ];

    public function calendrier()
    {
        return $this->belongsTo(cultures::class, 'calendar_id');
    }

}
