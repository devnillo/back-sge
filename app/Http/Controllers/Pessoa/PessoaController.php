<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Models\Pessoas;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PessoaController extends Controller
{
    public function register(StoreEscolaRequest $request)
    {
        $numero = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        try {
            // 'tipo_registro' => '30',
            $validated = $request->validated();
            $escola = Pessoas::create([
                'pessoas' => $validated['pessoas'],
                'tipo_registro' => $validated['tipo_registro'],
                'codigo_escola_inep' => $validated['codigo_escola_inep'],
                'codigo_pessoa_fisica_sistema_proprio' => $validated['codigo_pessoa_fisica_sistema_proprio'],
                'identificacao_unica_inep' => $validated['identificacao_unica_inep'],
                'numero_cpf' => $validated['numero_cpf'],
                'nome_completo' => $validated['nome_completo'],
                'data_nascimento' => $validated['data_nascimento'],
                'filiacao' => $validated['filiacao'],
                'filiacao_1' => $validated['filiacao_1'],
                'filiacao_2' => $validated['filiacao_2'],
                'sexo' => $validated['sexo'],
                'cor_raca' => $validated['cor_raca'],
                'nacionalidade' => $validated['nacionalidade'],
                'pais_nacionalidade' => $validated['pais_nacionalidade'],
                'municipio_nascimento' => $validated['municipio_nascimento'],
                'pessoa_fisica_com_deficiencia_ou_transtorno' => $validated['pessoa_fisica_com_deficiencia_ou_transtorno'],
                'pessoa_fisica_com_deficiencia_ou_transtorno_autismo' => $validated['pessoa_fisica_com_deficiencia_ou_transtorno_autismo'],
                'cegueira' => $validated['cegueira'],
                'baixa_visao' => $validated['baixa_visao'],
                'visao_monocular' => $validated['visao_monocular'],
                'surdez' => $validated['surdez'],
                'deficiencia_auditiva' => $validated['deficiencia_auditiva'],
                'surdocegueira' => $validated['surdocegueira'],
                'deficiencia_fisica' => $validated['deficiencia_fisica'],
                'deficiencia_intelectual' => $validated['deficiencia_intelectual'],
                'deficiencia_multipla' => $validated['deficiencia_multipla'],
                'transtorno_espectro_autista' => $validated['transtorno_espectro_autista'],
                'altas_habilidades_superdotacao' => $validated['altas_habilidades_superdotacao'],
                'auxilio_ledor' => $validated['auxilio_ledor'],
                'auxilio_transcricao' => $validated['auxilio_transcricao'],
                'guia_interprete' => $validated['guia_interprete'],
                'tradutor_interprete_libras' => $validated['tradutor_interprete_libras'],
                'leitura_labial' => $validated['leitura_labial'],
                'prova_ampliada' => $validated['prova_ampliada'],
                'prova_superampliada' => $validated['prova_superampliada'],
                'cd_audio_deficiente_visual' => $validated['cd_audio_deficiente_visual'],
                'prova_lingua_portuguesa_segunda_lingua' => $validated['prova_lingua_portuguesa_segunda_lingua'],
                'prova_video_libras' => $validated['prova_video_libras'],
                'material_didatico_prova_braille' => $validated['material_didatico_prova_braille'],
                'nenhum_recurso' => $validated['nenhum_recurso'],
                'numero_matricula_certidao_nascimento' => $validated['numero_matricula_certidao_nascimento'],
                'pais_residencia' => $validated['pais_residencia'],
                'cep' => $validated['cep'],
                'municipio_residencia' => $validated['municipio_residencia'],
                'localizacao_zona_residencia' => $validated['localizacao_zona_residencia'],
                'localizacao_diferenciada_residencia' => $validated['localizacao_diferenciada_residencia'],
                'maior_nivel_escolaridade_concluido' => $validated['maior_nivel_escolaridade_concluido'],
                'tipo_ensino_medio_cursado' => $validated['tipo_ensino_medio_cursado'],
                'codigo_curso_1' => $validated['codigo_curso_1'],
                'ano_conclusao_1' => $validated['ano_conclusao_1'],
                'instituicao_educacao_superior_1' => $validated['instituicao_educacao_superior_1'],
                'codigo_curso_2' => $validated['codigo_curso_2'],
                'ano_conclusao_2' => $validated['ano_conclusao_2'],
                'instituicao_educacao_superior_2' => $validated['instituicao_educacao_superior_2'],
                'codigo_curso_3' => $validated['codigo_curso_3'],
                'ano_conclusao_3' => $validated['ano_conclusao_3'],
                'instituicao_educacao_superior_3' => $validated['instituicao_educacao_superior_3'],
                'area_conhecimento_componentes_curriculares_1' => $validated['area_conhecimento_componentes_curriculares_1'],
                'area_conhecimento_componentes_curriculares_2' => $validated['area_conhecimento_componentes_curriculares_2'],
                'area_conhecimento_componentes_curriculares_3' => $validated['area_conhecimento_componentes_curriculares_3'],
                'tipo_pos_graduacao_1' => $validated['tipo_pos_graduacao_1'],
                'area_pos_graduacao_1' => $validated['area_pos_graduacao_1'],
                'ano_conclusao_pos_graduacao_1' => $validated['ano_conclusao_pos_graduacao_1'],
                'tipo_pos_graduacao_2' => $validated['tipo_pos_graduacao_2'],
                'area_pos_graduacao_2' => $validated['area_pos_graduacao_2'],
                'ano_conclusao_pos_graduacao_2' => $validated['ano_conclusao_pos_graduacao_2'],
                'tipo_pos_graduacao_3' => $validated['tipo_pos_graduacao_3'],
                'area_pos_graduacao_3' => $validated['area_pos_graduacao_3'],
                'ano_conclusao_pos_graduacao_3' => $validated['ano_conclusao_pos_graduacao_3'],
                'tipo_pos_graduacao_4' => $validated['tipo_pos_graduacao_4'],
                'area_pos_graduacao_4' => $validated['area_pos_graduacao_4'],
                'ano_conclusao_pos_graduacao_4' => $validated['ano_conclusao_pos_graduacao_4'],
                'tipo_pos_graduacao_5' => $validated['tipo_pos_graduacao_5'],
                'area_pos_graduacao_5' => $validated['area_pos_graduacao_5'],
                'ano_conclusao_pos_graduacao_5' => $validated['ano_conclusao_pos_graduacao_5'],
                'tipo_pos_graduacao_6' => $validated['tipo_pos_graduacao_6'],
                'area_pos_graduacao_6' => $validated['area_pos_graduacao_6'],
                'ano_conclusao_pos_graduacao_6' => $validated['ano_conclusao_pos_graduacao_6'],
                'nao_tem_pos_graduacao_concluida' => $validated['nao_tem_pos_graduacao_concluida'],
                'creche' => $validated['creche'],
                'pre_escola' => $validated['pre_escola'],
                'anos_iniciais_ensino_fundamental' => $validated['anos_iniciais_ensino_fundamental'],
                'anos_finais_ensino_fundamental' => $validated['anos_finais_ensino_fundamental'],
                'ensino_medio' => $validated['ensino_medio'],
                'educacao_jovens_adultos' => $validated['educacao_jovens_adultos'],
                'educacao_especial' => $validated['educacao_especial'],
                'educacao_indigena' => $validated['educacao_indigena'],
                'educacao_campo' => $validated['educacao_campo'],
                'educacao_ambiental' => $validated['educacao_ambiental'],
                'educacao_direitos_humanos' => $validated['educacao_direitos_humanos'],
                'educacao_bilingue_surdos' => $validated['educacao_bilingue_surdos'],
                'educacao_tecnologia_informacao_comunicacao' => $validated['educacao_tecnologia_informacao_comunicacao'],
                'genero_diversidade_sexual' => $validated['genero_diversidade_sexual'],
                'direitos_crianca_adolescente' => $validated['direitos_crianca_adolescente'],
                'educacao_relacoes_etnico_raciais_historia_afro_brasileira_africana' => $validated['educacao_relacoes_etnico_raciais_historia_afro_brasileira_africana'],
                'gestao_escolar' => $validated['gestao_escolar'],
                'outros' => $validated['outros'],
                'nenhum' => $validated['nenhum'],
                'endereco_eletronico_email' => $validated['endereco_eletronico_email'],
                ]);
            return response()->json([
                'success' => true,
                'escola' => $validated,
                'message' => 'Escola cadastrada com sucesso',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->errors(),
            ], 422);
        }
    }
}
