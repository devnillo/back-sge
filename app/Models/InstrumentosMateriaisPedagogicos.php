<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstrumentosMateriaisPedagogicos extends Model
{
    protected $fillable = [
        'mat_acervo_multimidia',
        'mat_brinquedos_educacao_infantil',
        'mat_materiais_cientificos',
        'mat_equipamento_audio',
        'mat_equipamento_agricola',
        'mat_instrumentos_musicais',
        'mat_atividades_culturais_artisticas',
        'mat_educacao_profissional',
        'mat_atividade_desportiva_recreacao',
        'mat_educacao_bilingue_surdos',
        'mat_educacao_escolar_indigena',
        'mat_relacoes_etnico_raciais',
        'mat_educacao_do_campo',
        'mat_educacao_quilombola',
        'mat_educacao_especial',
        'mat_nenhum_listado',
    ];
    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
