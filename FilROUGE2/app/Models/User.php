<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function Roles()
    {
        return $this->hasMany(Role::class);
    }

    public function Calendrier()
    {
        return $this->belongsTo(Calendrier::class);
    }

    public function solutionsAdapteesCommeAgriculteur()
    {
        return $this->hasMany(SolutionsAdaptees::class, 'receiver_id');
    }

    public function solutionsAdapteesCommeAgricole()
    {
        return $this->hasMany(SolutionsAdaptees::class, 'sender_id');
    }


    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

}
