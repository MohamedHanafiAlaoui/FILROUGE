<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtapeTechnique extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameetape',
        'descriptionetape',
        'duree_estimee',
        'id_FichesExplicatives',
    ];

    public function ficheExplicative()
    {
        return $this->belongsTo(FichesExplicatives::class,id_FichesExplicatives);
    }
}
