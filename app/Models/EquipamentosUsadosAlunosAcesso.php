<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EquipamentosUsadosAlunosAcesso extends Model
{
    protected $fillable = [
        'internet_acesso_equipamentos_escola',
        'internet_acesso_dispositivos_pessoais',
    ];
    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
