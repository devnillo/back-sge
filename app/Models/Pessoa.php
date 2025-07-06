<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Pessoa extends Authenticatable implements JWTSubject
{
    use HasRoles;
    // protected $guard_name = 'api';
    protected $with = ['roles'];
    protected $guard_name = 'pessoas';
    protected $fillable = [
        'tipo_registro',
        'codigo_escola_inep',
        'codigo_pessoa_fisica_sistema_proprio',
        'identificacao_unica_inep',
        'numero_cpf',
        'nome_completo',
        'data_nascimento',
        'filiacao',
        'filiacao_1',
        'filiacao_2',
        'sexo',
        'cor_raca',
        'nacionalidade',
        'pais_nacionalidade',
        'municipio_nascimento',
        'pessoa_fisica_com_deficiencia_ou_transtorno',
        'pessoa_fisica_com_deficiencia_ou_transtorno_autismo',
        'cegueira',
        'baixa_visao',
        'visao_monocular',
        'surdez',
        'deficiencia_auditiva',
        'surdocegueira',
        'deficiencia_fisica',
        'deficiencia_intelectual',
        'deficiencia_multipla',
        'transtorno_espectro_autista',
        'altas_habilidades_superdotacao',
        'auxilio_ledor',
        'auxilio_transcricao',
        'guia_interprete',
        'tradutor_interprete_libras',
        'leitura_labial',
        'prova_ampliada',
        'prova_superampliada',
        'cd_audio_deficiente_visual',
        'prova_lingua_portuguesa_segunda_lingua',
        'prova_video_libras',
        'material_didatico_prova_braille',
        'nenhum_recurso',
        'numero_matricula_certidao_nascimento',
        'pais_residencia',
        'cep',
        'municipio_residencia',
        'localizacao_zona_residencia',
        'localizacao_diferenciada_residencia',
        'maior_nivel_escolaridade_concluido',
        'tipo_ensino_medio_cursado',
        'codigo_curso_1',
        'ano_conclusao_1',
        'instituicao_educacao_superior_1',
        'codigo_curso_2',
        'ano_conclusao_2',
        'instituicao_educacao_superior_2',
        'codigo_curso_3',
        'ano_conclusao_3',
        'instituicao_educacao_superior_3',
        'area_conhecimento_componentes_curriculares_1',
        'area_conhecimento_componentes_curriculares_2',
        'area_conhecimento_componentes_curriculares_3',
        'tipo_pos_graduacao_1',
        'area_pos_graduacao_1',
        'ano_conclusao_pos_graduacao_1',
        'tipo_pos_graduacao_2',
        'area_pos_graduacao_2',
        'ano_conclusao_pos_graduacao_2',
        'tipo_pos_graduacao_3',
        'area_pos_graduacao_3',
        'ano_conclusao_pos_graduacao_3',
        'tipo_pos_graduacao_4',
        'area_pos_graduacao_4',
        'ano_conclusao_pos_graduacao_4',
        'tipo_pos_graduacao_5',
        'area_pos_graduacao_5',
        'ano_conclusao_pos_graduacao_5',
        'tipo_pos_graduacao_6',
        'area_pos_graduacao_6',
        'ano_conclusao_pos_graduacao_6',
        'nao_tem_pos_graduacao_concluida',
        'creche',
        'pre_escola',
        'anos_iniciais_ensino_fundamental',
        'anos_finais_ensino_fundamental',
        'ensino_medio',
        'educacao_jovens_adultos',
        'educacao_especial',
        'educacao_indigena',
        'educacao_campo',
        'educacao_ambiental',
        'educacao_direitos_humanos',
        'educacao_bilingue_surdos',
        'educacao_tecnologia_informacao_comunicacao',
        'genero_diversidade_sexual',
        'direitos_crianca_adolescente',
        'educacao_relacoes_etnico_raciais_historia_afro',
        'gestao_escolar',
        'outros',
        'nenhum',
        'endereco_eletronico_email',
        'role',
        'escola_id',
        'secretaria_id'
    ];
    public function escola()
    {
        return $this->belongsTo(Escola::class, 'escola_id');
    }
    public function secretaria()
    {
        return $this->belongsTo(Escola::class, 'secretaria_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
