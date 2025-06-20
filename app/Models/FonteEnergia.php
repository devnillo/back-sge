<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FonteEnergia extends Model
{
    protected $fillable = ['energia_rede_publica', 'energia_gerador_combustivel_fossil', 'energia_renergia_renovavel_ou_alternativaede_publica', 'energia_nao_ha'];

    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
