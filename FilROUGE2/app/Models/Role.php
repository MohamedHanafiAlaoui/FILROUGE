<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public function Users()
    {
        return $this->belongsTo(User::class);
    }
}
