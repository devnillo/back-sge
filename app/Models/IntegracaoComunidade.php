<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IntegracaoComunidade extends Model
{
    protected $fillable = [
        'possui_comunicacao_digital',
        'compartilha_espaco_comunidade',
        'usa_espacos_entorno_para_atividades',
        'escola_infra_id',
    ];
    protected function escola_infraestrutura(): BelongsTo
    {	
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
