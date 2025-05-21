<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbastecimentoAgua extends Model
{
    protected $fillable = [
        'fornece_agua_potavel',
        'agua_rede_publica',
        'agua_poco_artesiano',
        'agua_cacimba_cisterna_poco',
        'agua_fonte_rio_igarape_riacho_corrego',
        'agua_carro_pipa',
        'agua_nao_ha_abastecimento',
        'escola_infra_id'
    ];

    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
