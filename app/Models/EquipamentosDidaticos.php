<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EquipamentosDidaticos extends Model
{
    protected $fillable = [
        'equip_dvd_blu_ray',
        'equip_som',
        'equip_televisao',
        'equip_lousa_digital',
        'equip_projetor_multimidia',
        'equip_scanner',
        'equip_nenhum_listado',
        'escola_infra_id'
    ];
    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
