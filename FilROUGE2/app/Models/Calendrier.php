<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendrier extends Model
{
    protected $fillable = [
        'image',
        'name',
        'id_agriculteur',
        'etapes',
    ];

    public function User()
    {
        return  $this->hasMany(User::class);
    }
    public function CalendarEntry()
    {
        return $this->belongsTo(CalendarEntry::class);
    }
}
