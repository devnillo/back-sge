<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcessoInternet extends Model
{
    // protected $table = 'acesso_internets';
    protected $fillable = [
        'internet_uso_administrativo',
        'internet_uso_ensino_aprendizagem',
        'internet_uso_alunos',
        'internet_uso_comunidade',
        'internet_nao_possui',
    ];
    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
