<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrgaosColegiados extends Model
{
    protected $fillable = [
        'orgao_associacao_pais_mestres',
        'orgao_conselho_escolar',
        'orgao_gremio_estudantil',
        'orgao_outros',
        'orgao_nenhum',
        'escola_infra_id',
    ];
    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
