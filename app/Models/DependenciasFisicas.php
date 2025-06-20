<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DependenciasFisicas extends Model
{
    protected $table = 'dependencias_fisica';

    protected $fillable = [
        'dep_almoxarifado',
        'dep_area_vegetacao_gramado',
        'dep_auditorio',
        'dep_banheiro',
        'dep_banheiro_acessivel_pcd',
        'dep_banheiro_educacao_infantil',
        'dep_banheiro_funcionarios',
        'dep_banheiro_vestiario_chuveiro',
        'dep_biblioteca',
        'dep_cozinha',
        'dep_despensa',
        'dep_dormitorio_aluno',
        'dep_dormitorio_professor',
        'dep_laboratorio_ciencias',
        'dep_laboratorio_informatica',
        'dep_laboratorio_educacao_profissional',
        'dep_parque_infantil',
        'dep_patio_coberto',
        'dep_patio_descoberto',
        'dep_piscina',
        'dep_quadra_esportes_coberta',
        'dep_quadra_esportes_descoberta',
        'dep_refeitorio',
        'dep_sala_repouso_aluno',
        'dep_sala_artes',
        'dep_sala_musica_coral',
        'dep_sala_danca',
        'dep_sala_multiuso',
        'dep_terreirao',
        'dep_viveiro_animais',
        'dep_sala_diretoria',
        'dep_sala_leitura',
        'dep_sala_professores',
        'dep_sala_recursos_multifuncionais',
        'dep_sala_secretaria',
        'dep_sala_oficinas_profissionais',
        'dep_estudio_gravacao_edicao',
        'dep_area_horta_plantio_agricultura',
        'dep_nenhuma_das_dependencias',
    ];

    protected function escola_infraestrutura(): BelongsTo
    {
        return $this->belongsTo(EscolaInfraestrutura::class);
    }
}
