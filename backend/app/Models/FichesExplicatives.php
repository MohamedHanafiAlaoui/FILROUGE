<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FichesExplicatives extends Model
{
    
    protected $fillable = [
        'image',
        'name',
        'description'
    ];

    public function problems()
    {
        return $this->hasMany(Problem::class, 'id_FichesExplicatives');
    }
}
