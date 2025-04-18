<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarEntry extends Model
{
    protected $fillable = [
        'id_Calendar',
        'id_etapes',
        'description',
    ];

    public function Calendrier()
    {
        return  $this->hasMany(Calendrier::class);
    }
}
