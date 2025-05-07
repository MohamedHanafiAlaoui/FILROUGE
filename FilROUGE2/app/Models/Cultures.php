<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cultures extends Model
{
    protected $fillable = [
        'image',
        'name',
        'id_agriculteur',
        'etapes',
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }
    public function CalendarEntry()
    {
        return $this->belongsTo(CalendarEntry::class);
    }

    public function signalers()
    {
        return $this->hasMany(Signaler::class, 'id_Calendar');
    }
}

