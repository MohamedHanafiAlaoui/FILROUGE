<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueQuestions extends Model
{
    use HasFactory;
    protected $table = 'historique_questions';


    protected $fillable = [
        'question',
        'answer',
        'id_agricole',
    ];

    public function agricole()
    {
        return $this->belongsTo(User::class, 'id_agricole');
    }

}
