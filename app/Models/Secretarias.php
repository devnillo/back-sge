<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Secretarias extends Model
{
    // protected $with = ['users'];
    protected $table = 'secretarias';
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'senha',
        'cidade',
        'estado',
        'cep',
        'endereco',
    ];

    public function users(): hasMany
    {
        return $this->hasMany(User::class, 'secretaria_id');
    }
    public function escolas(): HasMany
    {
        return $this->hasMany(Escola::class);
    }

    protected $hidden = [
        'password',
    ];
}
