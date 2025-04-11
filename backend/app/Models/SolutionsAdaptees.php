<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SolutionsAdaptees extends Model
{
    use HasFactory;

    protected $table = 'solutions_adaptees';

    protected $fillable = [
        'id_agriculteur',
        'id_agricole',
        'name',
    ];

    public function agriculteur()
    {
        return $this->belongsTo(User::class, 'id_agriculteur');
    }

    public function agricole()
    {
        return $this->belongsTo(User::class, 'id_agricole');
    }
}
