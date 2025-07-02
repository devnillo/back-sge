<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormasDesenvolvimentoEducacaoAmbiental extends Model
{
    protected $fillable = [
        'educ_ambiental_conteudo_curricular',
        'educ_ambiental_componente_especifico',
        'educ_ambiental_eixo_estruturante',
        'educ_ambiental_eventos',
        'educ_ambiental_projetos_transversais',
        'educ_ambiental_nenhuma_opcao',
        'escola_infra_id',
    ];
    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
