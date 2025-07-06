<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePessoaRequest extends FormRequest
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
        $pessoaId = $this->route('id'); // Obtém o ID da pessoa a partir da rota

        return [
            'role' => 'string|nullable',
            'tipo_registro' => 'string|nullable',
            'codigo_escola_inep' => 'string|max:8|nullable',
            'identificacao_unica_inep' => 'string|max:12|nullable',
            'numero_cpf' => [
                'string',
                'max:11',
                'nullable',
                Rule::unique('pessoas')->ignore($pessoaId),
            ],
            'nome_completo' => 'string|max:100|nullable',
            'data_nascimento' => 'string|max:11|nullable',
            'filiacao' => 'string|max:1|nullable',
            'filiacao_1' => 'string|max:100|nullable',
            'filiacao_2' => 'string|max:100|nullable',
            'sexo' => 'string|max:1|nullable',
            'cor_raca' => 'string|max:1|nullable',
            'nacionalidade' => 'string|max:1|nullable',
            'pais_nacionalidade' => 'string|max:2|nullable',
            'municipio_nascimento' => 'string|max:7|nullable',
            'pessoa_fisica_com_deficiencia_ou_transtorno' => 'string|max:1|nullable',
            'pessoa_fisica_com_deficiencia_ou_transtorno_autismo' => 'string|max:1|nullable',
            'cegueira' => 'string|max:1|nullable',
            'baixa_visao' => 'string|max:1|nullable',
            'visao_monocular' => 'string|max:1|nullable',
            'surdez' => 'string|max:1|nullable',
            'deficiencia_auditiva' => 'string|max:1|nullable',
            'surdocegueira' => 'string|max:1|nullable',
            'deficiencia_fisica' => 'string|max:1|nullable',
            'deficiencia_intelectual' => 'string|max:1|nullable',
            'deficiencia_multipla' => 'string|max:1|nullable',
            'transtorno_espectro_autista' => 'string|max:1|nullable',
            'altas_habilidades_superdotacao' => 'string|max:1|nullable',
            'auxilio_ledor' => 'string|max:1|nullable',
            'auxilio_transcricao' => 'string|max:1|nullable',
            'guia_interprete' => 'string|max:1|nullable',
            'tradutor_interprete_libras' => 'string|max:1|nullable',
            'leitura_labial' => 'string|max:1|nullable',
            'prova_ampliada' => 'string|max:1|nullable',
            'prova_superampliada' => 'string|max:1|nullable',
            'cd_audio_deficiente_visual' => 'string|max:1|nullable',
            'prova_lingua_portuguesa_segunda_lingua' => 'string|max:1|nullable',
            'prova_video_libras' => 'string|max:1|nullable',
            'material_didatico_prova_braille' => 'string|max:1|nullable',
            'nenhum_recurso' => 'string|max:1|nullable',
            'numero_matricula_certidao_nascimento' => 'string|max:32|nullable',
            'pais_residencia' => 'string|max:3|nullable',
            'cep' => 'string|max:8|nullable',
            'municipio_residencia' => 'string|max:7|nullable',
            'localizacao_zona_residencia' => 'string|max:1|nullable',
            'localizacao_diferenciada_residencia' => 'string|max:1|nullable',
            'maior_nivel_escolaridade_concluido' => 'string|max:1|nullable',
            'tipo_ensino_medio_cursado' => 'string|max:1|nullable',
            'codigo_curso_1' => 'string|max:8|nullable',
            'ano_conclusao_1' => 'string|max:4|nullable',
            'instituicao_educacao_superior_1' => 'string|max:7|nullable',
            'codigo_curso_2' => 'string|max:8|nullable',
            'ano_conclusao_2' => 'string|max:4|nullable',
            'instituicao_educacao_superior_2' => 'string|max:7|nullable',
            'codigo_curso_3' => 'string|max:8|nullable',
            'ano_conclusao_3' => 'string|max:4|nullable',
            'instituicao_educacao_superior_3' => 'string|max:7|nullable',
            'area_conhecimento_componentes_curriculares_1' => 'string|max:2|nullable',
            'area_conhecimento_componentes_curriculares_2' => 'string|max:2|nullable',
            'area_conhecimento_componentes_curriculares_3' => 'string|max:2|nullable',
            'tipo_pos_graduacao_1' => 'string|max:1|nullable',
            'area_pos_graduacao_1' => 'string|max:2|nullable',
            'ano_conclusao_pos_graduacao_1' => 'string|max:4|nullable',
            'tipo_pos_graduacao_2' => 'string|max:1|nullable',
            'area_pos_graduacao_2' => 'string|max:2|nullable',
            'ano_conclusao_pos_graduacao_2' => 'string|max:4|nullable',
            'tipo_pos_graduacao_3' => 'string|max:1|nullable',
            'area_pos_graduacao_3' => 'string|max:2|nullable',
            'ano_conclusao_pos_graduacao_3' => 'string|max:4|nullable',
            'tipo_pos_graduacao_4' => 'string|max:1|nullable',
            'area_pos_graduacao_4' => 'string|max:2|nullable',
            'ano_conclusao_pos_graduacao_4' => 'string|max:4|nullable',
            'tipo_pos_graduacao_5' => 'string|max:1|nullable',
            'area_pos_graduacao_5' => 'string|max:2|nullable',
            'ano_conclusao_pos_graduacao_5' => 'string|max:4|nullable',
            'tipo_pos_graduacao_6' => 'string|max:1|nullable',
            'area_pos_graduacao_6' => 'string|max:2|nullable',
            'ano_conclusao_pos_graduacao_6' => 'string|max:4|nullable',
            'nao_tem_pos_graduacao_concluida' => 'string|max:1|nullable',
            'creche' => 'string|max:1|nullable',
            'pre_escola' => 'string|max:1|nullable',
            'anos_iniciais_ensino_fundamental' => 'string|max:1|nullable',
            'anos_finais_ensino_fundamental' => 'string|max:1|nullable',
            'ensino_medio' => 'string|max:1|nullable',
            'educacao_jovens_adultos' => 'string|max:1|nullable',
            'educacao_especial' => 'string|max:1|nullable',
            'educacao_indigena' => 'string|max:1|nullable',
            'educacao_campo' => 'string|max:1|nullable',
            'educacao_ambiental' => 'string|max:1|nullable',
            'educacao_direitos_humanos' => 'string|max:1|nullable',
            'educacao_bilingue_surdos' => 'string|max:1|nullable',
            'educacao_tecnologia_informacao_comunicacao' => 'string|max:1|nullable',
            'genero_diversidade_sexual' => 'string|max:1|nullable',
            'direitos_crianca_adolescente' => 'string|max:1|nullable',
            'educacao_relacoes_etnico_raciais_historia_afro_brasileira_africana' => 'string|max:1|nullable',
            'gestao_escolar' => 'string|max:1|nullable',
            'outros' => 'string|max:1|nullable',
            'nenhum' => 'string|max:1|nullable',
            'endereco_eletronico_email' => 'string|max:100|nullable',

            'escola_id' => 'integer|nullable',
            'secretaria_id' => 'integer|nullable',
        ];
    }
}
