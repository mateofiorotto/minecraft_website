<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Acquisition;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes; //activar los borrados logicos

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function editions()
{
    return $this->belongsToMany(Edition::class, 'acquisitions')
        ->withPivot(['status', 'buy_date'])
        ->withTimestamps();
}

    // public function acquisitions()
    // {
    //     return $this->hasMany(Acquisition::class, 'user_id', 'id');
    // }

    // public function editions()
    // {
    //     return $this->belongsToMany(Edition::class, 'acquisitions')
    //         ->withPivot('buy_date', 'status')
    //         ->withTimestamps();
    // }
}
