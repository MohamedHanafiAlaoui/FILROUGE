<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = [
        'symptoms',
        'solutions',
        'id_FichesExplicatives',
    ];

    public function ficheExplicative()
    {
        return $this->belongsTo(FichesExplicatives::class, 'id_FichesExplicatives');
    }

}
