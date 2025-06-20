<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TratamentoLixo extends Model
{
    protected $table = 'tratamento_lixo';
    protected $fillable = [
        'tratamento_separacao',
        'tratamento_reaproveitamento',
        'tratamento_reciclagem',
        'tratamento_nao_faz',
    ];

    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
