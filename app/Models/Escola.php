<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $fillable = [
        'nome',
        'codigo',
        'municipio',
        'distrito',
        'bairro',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'email',
        'dependencia',
        // 'password' => Hash::make($credentials['password']),
        'admin_id'
    ];

    protected $hidden = [
        'password',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
