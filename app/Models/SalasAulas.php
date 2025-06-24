<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalasAulas extends Model
{
    protected $table = 'infra_salas_aulas';

    protected $fillable = [
        'qtd_salas_utilizadas_predio_escolar',
        'qtd_salas_utilizadas_fora_predio',
        'qtd_salas_climatizadas',
        'qtd_salas_acessiveis_pcd',
    ];

    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
