<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePessoaRequest extends FormRequest
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
            // 'role' => 'string',
            'tipo_registro' => 'string',
            'codigo_escola_inep' => 'string|max:8',
            // 'codigo_pessoa_fisica_sistema_proprio' => 'string|max:20|required|unique:pessoas',
            'identificacao_unica_inep' => 'string|max:12',
            'numero_cpf' => 'string|max:11|required|unique:pessoas',
            'nome_completo' => 'string:max:100|required',
            'data_nascimento' => 'string|max:11|required',
            'filiacao' => 'string|max:1|required',
            'filiacao_1' => 'string|max:100',
            'filiacao_2' => 'string|max:100',
            'sexo' => 'string|max:1|required',
            'cor_raca' => 'string|max:1|required',
            'nacionalidade' => 'string|max:1|required',
            'pais_nacionalidade' => 'string|max:2|required',
            'municipio_nascimento' => 'string|max:7',
            'pessoa_fisica_com_deficiencia_ou_transtorno' => 'string|max:1',
            'pessoa_fisica_com_deficiencia_ou_transtorno_autismo' => 'string|max:1',
            'cegueira' => 'string|max:1',
            'baixa_visao' => 'string|max:1',
            'visao_monocular' => 'string|max:1',
            'surdez' => 'string|max:1',
            'deficiencia_auditiva' => 'string|max:1',
            'surdocegueira' => 'string|max:1',
            'deficiencia_fisica' => 'string|max:1',
            'deficiencia_intelectual' => 'string|max:1',
            'deficiencia_multipla' => 'string|max:1',
            'transtorno_espectro_autista' => 'string|max:1',
            'altas_habilidades_superdotacao' => 'string|max:1',
            'auxilio_ledor' => 'string|max:1',
            'auxilio_transcricao' => 'string|max:1',
            'guia_interprete' => 'string|max:1',
            'tradutor_interprete_libras' => 'string|max:1',
            'leitura_labial' => 'string|max:1',
            'prova_ampliada' => 'string|max:1',
            'prova_superampliada' => 'string|max:1',
            'cd_audio_deficiente_visual' => 'string|max:1',
            'prova_lingua_portuguesa_segunda_lingua' => 'string|max:1',
            'prova_video_libras' => 'string|max:1',
            'material_didatico_prova_braille' => 'string|max:1',
            'nenhum_recurso' => 'string|max:1',
            'numero_matricula_certidao_nascimento' => 'string|max:32',
            'pais_residencia' => 'string|max:3',
            'cep' => 'string|max:8',
            'municipio_residencia' => 'string|max:7',
            'localizacao_zona_residencia' => 'string|max:1',
            'localizacao_diferenciada_residencia' => 'string|max:1',
            'maior_nivel_escolaridade_concluido' => 'string|max:1',
            'tipo_ensino_medio_cursado' => 'string|max:1',
            'codigo_curso_1' => 'string|max:8',
            'ano_conclusao_1' => 'string|max:4',
            'instituicao_educacao_superior_1' => 'string|max:7',
            'codigo_curso_2' => 'string|max:8',
            'ano_conclusao_2' => 'string|max:4',
            'instituicao_educacao_superior_2' => 'string|max:7',
            'codigo_curso_3' => 'string|max:8',
            'ano_conclusao_3' => 'string|max:4',
            'instituicao_educacao_superior_3' => 'string|max:7',
            'area_conhecimento_componentes_curriculares_1' => 'string|max:2',
            'area_conhecimento_componentes_curriculares_2' => 'string|max:2',
            'area_conhecimento_componentes_curriculares_3' => 'string|max:2',
            'tipo_pos_graduacao_1' => 'string|max:1',
            'area_pos_graduacao_1' => 'string|max:2',
            'ano_conclusao_pos_graduacao_1' => 'string|max:4',
            'tipo_pos_graduacao_2' => 'string|max:1',
            'area_pos_graduacao_2' => 'string|max:2',
            'ano_conclusao_pos_graduacao_2' => 'string|max:4',
            'tipo_pos_graduacao_3' => 'string|max:1',
            'area_pos_graduacao_3' => 'string|max:2',
            'ano_conclusao_pos_graduacao_3' => 'string|max:4',
            'tipo_pos_graduacao_4' => 'string|max:1',
            'area_pos_graduacao_4' => 'string|max:2',
            'ano_conclusao_pos_graduacao_4' => 'string|max:4',
            'tipo_pos_graduacao_5' => 'string|max:1',
            'area_pos_graduacao_5' => 'string|max:2',
            'ano_conclusao_pos_graduacao_5' => 'string|max:4',
            'tipo_pos_graduacao_6' => 'string|max:1',
            'area_pos_graduacao_6' => 'string|max:2',
            'ano_conclusao_pos_graduacao_6' => 'string|max:4',
            'nao_tem_pos_graduacao_concluida' => 'string|max:1',
            'creche' => 'string|max:1',
            'pre_escola' => 'string|max:1',
            'anos_iniciais_ensino_fundamental' => 'string|max:1',
            'anos_finais_ensino_fundamental' => 'string|max:1',
            'ensino_medio' => 'string|max:1',
            'educacao_jovens_adultos' => 'string|max:1',
            'educacao_especial' => 'string|max:1',
            'educacao_indigena' => 'string|max:1',
            'educacao_campo' => 'string|max:1',
            'educacao_ambiental' => 'string|max:1',
            'educacao_direitos_humanos' => 'string|max:1',
            'educacao_bilingue_surdos' => 'string|max:1',
            'educacao_tecnologia_informacao_comunicacao' => 'string|max:1',
            'genero_diversidade_sexual' => 'string|max:1',
            'direitos_crianca_adolescente' => 'string|max:1',
            'educacao_relacoes_etnico_raciais_historia_afro_brasileira_africana' => 'string|max:1',
            'gestao_escolar' => 'string|max:1',
            'outros' => 'string|max:1',
            'nenhum' => 'string|max:1',
            'endereco_eletronico_email' => 'string|max:100',

            'escola_id' => 'integer|required',
        ];
    }
}
