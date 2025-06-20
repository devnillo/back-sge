<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DestinacaoLixo extends Model
{
    protected $table = 'destinacao_lixos';

    protected $fillable = [
        'lixo_servico_coleta',
        'lixo_queima',
        'lixo_enterra',
        'lixo_destinacao_final_licenciada',
        'lixo_descarta_outra_area',
    ];

    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
