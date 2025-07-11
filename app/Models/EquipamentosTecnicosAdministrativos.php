<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EquipamentosTecnicosAdministrativos extends Model
{
    protected $fillable = [
        'equip_antena_parabolica',
        'equip_computadores',
        'equip_copiadora',
        'equip_impressora',
        'equip_impressora_multifuncional',
        'equip_scanner',
        'equip_nenhum_listado',
        'escola_infra_id'
    ];

    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
