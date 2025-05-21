<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    // protected $with = ['roles'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'secretaria_id',
        // 'role'
    ];
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }

    public function secretarias(): BelongsTo
    {
        return $this->belongsTo(Secretarias::class, 'secretaria_id');
    }


    public function temPermissao($permissao)
    {
        return $this->roles()->whereHas('permissions', function ($q) use ($permissao) {
            $q->where('nome', $permissao);
        })->exists();
    }

    public function escolas()
    {
        return $this->hasMany(Escola::class, 'admin_id');
    }
    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
