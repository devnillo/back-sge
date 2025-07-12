<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTurmaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'tipo_registro' => 'max:2',
            'codigo_escola_inep' => 'required|max:8',
            'codigo_turma' => 'required|max:20|unique:turmas',
            'codigo_turma_inep' => 'max:10|unique:turmas',
            'nome_turma' => 'required|max:80|unique:turmas',
            'tipo_medicao' => 'required',

            'horario_inicio'  => 'max:2',
            'horario_minuto_inicio' => 'max:2',
            'horario_fim' => 'max:2',
            'horario_minuto_fim' => 'max:2',

            'domingo' => 'max:1',
            'segunda' => 'max:1',
            'terca' => 'max:1',
            'quarta' => 'max:1',
            'quinta' => 'max:1',
            'sexta' => 'max:1',
            'sabado' => 'max:1',

            'escolarizacao' => 'required|max:1',
            'atividade_complementar' => 'required|max:1',
            'atendimento_educacional_especial' => 'required|max:1',

            'formacao_geral_basica' => 'max:1',
            'itinerario_formativo' => 'max:1',
            'nao_se_aplica' => 'max:1',

            'atividade_complementar_codigo_1' => 'max:5',
            'atividade_complementar_codigo_2' => 'max:5',
            'atividade_complementar_codigo_3' => 'max:5',
            'atividade_complementar_codigo_4' => 'max:5',
            'atividade_complementar_codigo_5' => 'max:5',
            'atividade_complementar_codigo_6' => 'max:5',

            'local_funcionamento_diferenciado_turma'  => 'max:1',
            'modalidade' => 'max:1',
            'etapa' => 'max:2',
            'codigo_curso' => 'max:8',

            'serie_ano' => 'max:1',
            'periodos_semestrais' => 'max:1',
            'ciclos' => 'max:1',
            'grupos_nao_seriados' => 'max:1',
            'modulos' => 'max:1',
            'alternancia_regular_periodos' => 'max:1',

            'eletivas' => 'max:1',
            'libras' => 'max:1',
            'lingua_indigina' => 'max:1',
            'lingua_estrangeira_espanhol' => 'max:1',
            'lingua_estrangeira_frances' => 'max:1',
            'lingua_estrangeira_outra' => 'max:1',
            'projeto_vida' => 'max:1',
            'trilhas_aprofundamento' => 'max:1',
            'outras_unidades_curriculares' => 'max:500',

            'quimica' => 'max:1',
            'fisica' => 'max:1',
            'matematica' => 'max:1',
            'biologia' => 'max:1',
            'ciencias' => 'max:1',
            'portugues' => 'max:1',
            'ingles' => 'max:1',
            'espanhol' => 'max:1',
            'outra_lingua_estrangeira' => 'max:1',
            'arte' => 'max:1',
            'educacao_fisica' => 'max:1',
            'historia' => 'max:1',
            'geografia' => 'max:1',
            'filosofia' => 'max:1',
            'informatica' => 'max:1',
            'areas_conhecimento_profissionalizantes' => 'max:1',
            'materia_libras' => 'max:1',
            'areas_conhecimento_pedagogicas' => 'max:1',
            'ensino_religioso' => 'max:1',
            'lingua_indigina' => 'max:1',
            'estudos_sociais' => 'max:1',
            'sociologia' => 'max:1',
            'literatura_frances' => 'max:1',
            'lingua_portuguesa_segunda_lingua' => 'max:1',
            'estagio_supervisionado' => 'max:1',
            'materia_projeto_vida' => 'max:1',
            'materia_outras_unidades_curriculares' => 'max:1',

            'classe_bilingue_surdos' => 'required|max:1',
            'escola_id' =>'required'
        ];
    }
}
