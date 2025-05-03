<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $fillable = [
        'nome',
        'inep',
        'municipio',
        'distrito',
        'bairro',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'email',
        'dependencia',
        'password',
        'admin_id'
    ];

    protected $hidden = [
        'password',
    ];

    public function admins()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
