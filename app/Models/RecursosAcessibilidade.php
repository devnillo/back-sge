<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecursosAcessibilidade extends Model
{
    
    
    protected $fillable = [
        'acess_corrimao_guarda_corpos',
        'acess_elevador',
        'acess_pisos_tateis',
        'acess_portas_vao_80cm',
        'acess_rampas',
        'acess_sinalizacao_luminosa',
        'acess_sinalizacao_sonora',
        'acess_sinalizacao_tatil',
        'acess_sinalizacao_visual',
        'acess_nenhum_recurso_listado',
        'escola_infra_id'
    ];
    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
