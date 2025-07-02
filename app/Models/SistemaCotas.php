<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SistemaCotas extends Model
{
    protected $fillable = [
        'cota_ppi',
        'cota_renda',
        'cota_escola_publica',
        'cota_deficiencia',
        'cota_outros_grupos',
        'cota_ampla_concorrencia',
        'escola_infra_id',
    ];
    protected function escola_infraestrutura(): BelongsTo
    {	
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
