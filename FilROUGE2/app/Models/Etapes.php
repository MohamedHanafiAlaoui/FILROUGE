<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etapes extends Model
{
    public function calendarEntries()
    {
        return $this->hasMany(Stadesculture::class, 'id_etapes');
    }
}
