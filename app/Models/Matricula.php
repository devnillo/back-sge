<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{

    protected $fillable = [
        'turma_id',
        'aluno_id',
        'data_matricula',
        'data_transferencia',
        'status',
        'escola_id',
        'motivo_transferencia'
    ];
    protected function aluno()
    {
        return $this->belongsTo(Pessoa::class);
    }
    protected function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}
