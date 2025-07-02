<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InfraestruturaProfissionais extends Model
{
    protected $fillable = [
        'prof_agricultura_horta_plantio',
        'prof_auxiliares_secretaria',
        'prof_servicos_gerais',
        'prof_biblioteca_leitura',
        'prof_saude_urgencia_emergencia',
        'prof_coordenador_turno',
        'prof_fonoaudiologo',
        'prof_nutricionista',
        'prof_psicologo',
        'prof_cozinha_alimentacao',
        'prof_apoio_supervisao_pedagogica',
        'prof_secretario_escolar',
        'prof_segurança_patrimonial',
        'prof_tecnologia_laboratorio_multimeios',
        'prof_vice_diretor_gestor_administrativo',
        'prof_orientador_comunitario',
        'prof_interprete_libras',
        'prof_revisor_braille_assistente_vidente',
        'prof_nenhuma_funcao_listada',
    ];
    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
