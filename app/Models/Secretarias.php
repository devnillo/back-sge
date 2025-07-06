<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Secretarias extends Authenticatable implements JWTSubject
{
    // protected $with = ['users'];
    protected $table = 'secretarias';
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'municipio',
        'estado',
        'bairro',
        'endereco',
        'cep',
        'numero',
        'password',
    ];

    public function users(): hasMany
    {
        return $this->hasMany(User::class, 'secretaria_id');
    }
    public function pessoas(): hasMany
    {
        return $this->hasMany(Pessoa::class, 'secretaria_id');
    }
    public function escolas(): HasMany
    {
        return $this->hasMany(Escola::class);
    }
    // public function getAuthPassword()
    // {
    //     return $this->senha;
    // }
    protected $hidden = [
        'password',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
