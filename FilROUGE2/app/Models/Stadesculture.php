<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stadesculture extends Model
{
    use HasFactory;

    protected $table = 'stades_cultures'; 
    protected $fillable = [
        'id_culture',
        'id_etapes',
        'description',
    ];

    public function Cultures()
    {
        return $this->belongsTo(cultures::class, 'id_culture');
    }

    public function etape()
    {
        return $this->belongsTo(Etapes::class, 'id_etapes');
    }
}
