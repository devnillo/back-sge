<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turma extends Model
{
    protected $fillable = [
        'tipo_registro',
        'codigo_escola_inep',
        'codigo_turma',
        'codigo_turma_inep',
        'nome_turma',
        'tipo_medicao',

        'horario_inicio',
        'horario_minuto_inicio',
        'horario_fim',
        'horario_minuto_fim',

        'domingo',
        'segunda',
        'terca',
        'quarta',
        'quinta',
        'sexta',
        'sabado',

        'escolarizacao',
        'atividade_complementar',
        'atendimento_educacional_especial',

        'formacao_geral_basica',
        'itinerario_formativo',
        'nao_se_aplica',

        'atividade_complementar_codigo_1',
        'atividade_complementar_codigo_2',
        'atividade_complementar_codigo_3',
        'atividade_complementar_codigo_4',
        'atividade_complementar_codigo_5',
        'atividade_complementar_codigo_6',

        'local_funcionamento_diferenciado_turma',
        'modalidade',
        'etapa',
        'codigo_curso',
        
        'serie_ano',
        'periodos_semestrais',
        'ciclos',
        'grupo_nao_seriado',
        'modulos',
        'alternancia_regular_periodos',

        'eletivas',
        'libras',
        'lingua_indigina',
        'lingua_estrangeira_espanhol',
        'lingua_estrangeira_frances',
        'lingua_estrangeira_outra',
        'projeto_vida',
        'trilhas_aprofundamento',
        'outras_unidades_curriculares',

        'quimica',
        'fisica',
        'matematica',
        'biologia',
        'ciencias',
        'portugues',
        'ingles',
        'espanhol',
        'outra_lingua_estrangeira',
        'arte',
        'educacao_fisica',
        'historia',
        'geografia',
        'filosofia',
        'informatica',
        'areas_conhecimento_profissionalizantes',
        'materia_libras',
        'areas_conhecimento_pedagogicas',
        'ensino_religioso',
        'lingua_indigina',
        'estudos_sociais',
        'sociologia',
        'literatura_frances',
        'lingua_portuguesa_segunda_lingua',
        'estagio_supervisionado',
        'materia_projeto_vida',
        'materia_outras_unidades_curriculares',

        'classe_bilingue_surdos',

        'escola_id'
    ];
    
    protected function escola (): BelongsTo
    {
        return $this->belongsTo(Escola::class);
    }
    protected function alunos (): HasMany
    {
        return $this->hasMany(Aluno::class);
    }
    protected function professores (): HasMany
    {
        return $this->hasMany(professor::class);
    }
}
