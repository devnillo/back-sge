<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComputadoresUsoAlunos extends Model
{
    protected $fillable = [
        'comp_aluno_desktop',
        'comp_aluno_portateis',
        'comp_aluno_tablets',
        'escola_infra_id'
    ];
    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
