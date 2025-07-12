<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTurmaRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tipo_registro' => 'nullable|max:2',
            'codigo_escola_inep' => 'max:8',
            'codigo_turma' => 'max:20|unique:turmas,codigo_turma,' . $this->route('id'),
            'codigo_turma_inep' => 'nullable|max:10|unique:turmas,codigo_turma_inep,' . $this->route('id'),
            'nome_turma' => 'max:80|unique:turmas,nome_turma,' . $this->route('id'), 
            'tipo_medicao' => 'max:1',

            'horario_inicio'  => 'nullable|max:2',
            'horario_minuto_inicio' => 'nullable|max:2',
            'horario_fim' => 'nullable|max:2',
            'horario_minuto_fim' => 'nullable|max:2',

            'domingo' => 'nullable|max:1',
            'segunda' => 'nullable|max:1',
            'terca' => 'nullable|max:1',
            'quarta' => 'nullable|max:1',
            'quinta' => 'nullable|max:1',
            'sexta' => 'nullable|max:1',
            'sabado' => 'nullable|max:1',

            'escolarizacao' => 'nullable|max:1',
            'atividade_complementar' => 'nullable|max:1',
            'atendimento_educacional_especial' => 'nullable|max:1',

            'formacao_geral_basica' => 'nullable|max:1',
            'itinerario_formativo' => 'nullable|max:1',
            'nao_se_aplica' => 'nullable|max:1',

            'atividade_complementar_codigo_1' => 'nullable|max:5',
            'atividade_complementar_codigo_2' => 'nullable|max:5',
            'atividade_complementar_codigo_3' => 'nullable|max:5',
            'atividade_complementar_codigo_4' => 'nullable|max:5',
            'atividade_complementar_codigo_5' => 'nullable|max:5',
            'atividade_complementar_codigo_6' => 'nullable|max:5',

            'local_funcionamento_diferenciado_turma'  => 'nullable|max:1',
            'modalidade' => 'nullable|max:1',
            'etapa' => 'nullable|max:2',
            'codigo_curso' => 'nullable|max:8',

            'serie_ano' => 'nullable|max:1',
            'periodos_semestrais' => 'nullable|max:1',
            'ciclos' => 'nullable|max:1',
            'grupo_nao_seriado' => 'nullable|max:1',
            'modulos' => 'nullable|max:1',
            'alternancia_regular_periodos' => 'nullable|max:1',

            'eletivas' => 'nullable|max:1',
            'libras' => 'nullable|max:1',
            'lingua_indigina' => 'nullable|max:1',
            'lingua_estrangeira_espanhol' => 'nullable|max:1',
            'lingua_estrangeira_frances' => 'nullable|max:1',
            'lingua_estrangeira_outra' => 'nullable|max:1',
            'projeto_vida' => 'nullable|max:1',
            'trilhas_aprofundamento' => 'nullable|max:1',
            'outras_unidades_curriculares' => 'nullable|max:500',

            'quimica' => 'nullable|max:1',
            'fisica' => 'nullable|max:1',
            'matematica' => 'nullable|max:1',
            'biologia' => 'nullable|max:1',
            'ciencias' => 'nullable|max:1',
            'portugues' => 'nullable|max:1',
            'ingles' => 'nullable|max:1',
            'espanhol' => 'nullable|max:1',
            'outra_lingua_estrangeira' => 'nullable|max:1',
            'arte' => 'nullable|max:1',
            'educacao_fisica' => 'nullable|max:1',
            'historia' => 'nullable|max:1',
            'geografia' => 'nullable|max:1',
            'filosofia' => 'nullable|max:1',
            'informatica' => 'nullable|max:1',
            'areas_conhecimento_profissionalizantes' => 'nullable|max:1',
            'materia_libras' => 'nullable|max:1',
            'areas_conhecimento_pedagogicas' => 'nullable|max:1',
            'ensino_religioso' => 'nullable|max:1',
            'lingua_indigina' => 'nullable|max:1',
            'estudos_sociais' => 'nullable|max:1',
            'sociologia' => 'nullable|max:1',
            'literatura_frances' => 'nullable|max:1',
            'lingua_portuguesa_segunda_lingua' => 'nullable|max:1',
            'estagio_supervisionado' => 'nullable|max:1',
            'materia_projeto_vida' => 'nullable|max:1',
            'materia_outras_areas_conhecimento' => 'nullable|max:1',

            'classe_bilingue_surdos' => 'nullable|max:1',

            'escola_id' => 'nullable|exists:escolas,id', // Verifica se a escola existe
        ];
    }
}
