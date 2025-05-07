<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etapes extends Model
{
    public function calendarEntries()
    {
        return $this->hasMany(CalendarEntry::class, 'id_etapes');
    }
}
