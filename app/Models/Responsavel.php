<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Responsavel extends Authenticatable implements JWTSubject
{
    use HasRoles;
    protected $table = 'responsaveis';
    protected $guard_name = 'responsavel';
    protected $with = ['roles'];
    protected $fillable = [
        'nome_responsavel',
        'sexo_responsavel',
        'cor_responsavel',
        'nacionalidade_responsavel',
        'cpf_responsavel',
        'data_nascimento_responsavel',
        'naturalidade_responsavel',
        'endereco_responsavel',
        'telefone_responsavel',
        'email_responsavel',
        'escolaridade_responsavel',
        'parentesco_responsavel',
    ];

    // public function pessoa()
    // {
    //     return $this->belongsTo(Pessoa::class);
    // }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
