<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LinguaEnsino extends Model
{
    protected $fillable = [
        'ensino_lingua_indigena',
        'ensino_lingua_portuguesa',
        'codigo_lingua_indigena_1',
        'codigo_lingua_indigena_2',
        'codigo_lingua_indigena_3',
        'escola_infra_id',
    ];
    protected function escola_infraestrutura(): BelongsTo
    {	
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
