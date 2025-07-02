<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RedeLocalInteligacaoComputadores extends Model
{   
    protected $table = 'rede_local_inteligacao_computadores';
    protected $fillable = [
        'rede_local_cabo',
        'rede_local_wireless',
        'rede_local_nao_ha',
    ];
    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
