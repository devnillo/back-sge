<?php

namespace App\Http\Controllers\Pessoa;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Models\Pessoa;
use App\Models\Role;
use App\Services\PessoaService;
use DateTime;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Stmt\TryCatch;

class PessoasController extends Controller
{
    public function register(StorePessoaRequest $request, PessoaService $pessoaService)
    {
        try {
            $validated = $request->validated();
            $numero = str_pad(mt_rand(0, 99999999), 7, '0', STR_PAD_LEFT);
            $validated['codigo_pessoa_fisica_sistema_proprio'] = $numero;
            $pessoa = $pessoaService->register($validated);
            return ApiResponse::success($pessoa, 'Pessoa cadastrada com sucesso', 201);
        } catch (ValidationException $e) {
            return ApiResponse::error('Erro de validação', 422, $e->errors());
        }
    }
    public function update(UpdatePessoaRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $pessoa = Pessoa::findOrFail($id); 

            $pessoa->update([
                'tipo_registro' => "30",
                'codigo_escola_inep' => $validated['codigo_escola_inep'] ?? $pessoa->codigo_escola_inep,
                'codigo_pessoa_fisica_sistema_proprio' => $pessoa->codigo_pessoa_fisica_sistema_proprio, 
                'identificacao_unica_inep' => $validated['identificacao_unica_inep'] ?? $pessoa->identificacao_unica_inep,
                'numero_cpf' => $validated['numero_cpf'] ?? $pessoa->numero_cpf,
                'nome_completo' => $validated['nome_completo'] ?? $pessoa->nome_completo,
                'data_nascimento' => $validated['data_nascimento'] ?? $pessoa->data_nascimento,
                'filiacao' => $validated['filiacao'] ?? $pessoa->filiacao,
                'filiacao_1' => $validated['filiacao_1'] ?? $pessoa->filiacao_1,
                'filiacao_2' => $validated['filiacao_2'] ?? $pessoa->filiacao_2,
                'sexo' => $validated['sexo'] ?? $pessoa->sexo,
                'cor_raca' => $validated['cor_raca'] ?? $pessoa->cor_raca,
                'nacionalidade' => $validated['nacionalidade'] ?? $pessoa->nacionalidade,
                'pais_nacionalidade' => $validated['pais_nacionalidade'] ?? $pessoa->pais_nacionalidade,
                'municipio_nascimento' => $validated['municipio_nascimento'] ?? $pessoa->municipio_nascimento,
                'pessoa_fisica_com_deficiencia_ou_transtorno' => $validated['pessoa_fisica_com_deficiencia_ou_transtorno'] ?? $pessoa->pessoa_fisica_com_deficiencia_ou_transtorno,
                'pessoa_fisica_com_deficiencia_ou_transtorno_autismo' => $validated['pessoa_fisica_com_deficiencia_ou_transtorno_autismo'] ?? $pessoa->pessoa_fisica_com_deficiencia_ou_transtorno_autismo,
                'cegueira' => $validated['cegueira'] ?? $pessoa->cegueira,
                'baixa_visao' => $validated['baixa_visao'] ?? $pessoa->baixa_visao,
                'visao_monocular' => $validated['visao_monocular'] ?? $pessoa->visao_monocular,
                'surdez' => $validated['surdez'] ?? $pessoa->surdez,
                'deficiencia_auditiva' => $validated['deficiencia_auditiva'] ?? $pessoa->deficiencia_auditiva,
                'surdocegueira' => $validated['surdocegueira'] ?? $pessoa->surdocegueira,
                'deficiencia_fisica' => $validated['deficiencia_fisica'] ?? $pessoa->deficiencia_fisica,
                'deficiencia_intelectual' => $validated['deficiencia_intelectual'] ?? $pessoa->deficiencia_intelectual,
                'deficiencia_multipla' => $validated['deficiencia_multipla'] ?? $pessoa->deficiencia_multipla,
                'transtorno_espectro_autista' => $validated['transtorno_espectro_autista'] ?? $pessoa->transtorno_espectro_autista,
                'altas_habilidades_superdotacao' => $validated['altas_habilidades_superdotacao'] ?? $pessoa->altas_habilidades_superdotacao,
                'auxilio_ledor' => $validated['auxilio_ledor'] ?? $pessoa->auxilio_ledor,
                'auxilio_transcricao' => $validated['auxilio_transcricao'] ?? $pessoa->auxilio_transcricao,
                'guia_interprete' => $validated['guia_interprete'] ?? $pessoa->guia_interprete,
                'tradutor_interprete_libras' => $validated['tradutor_interprete_libras'] ?? $pessoa->tradutor_interprete_libras,
                'leitura_labial' => $validated['leitura_labial'] ?? $pessoa->leitura_labial,
                'prova_ampliada' => $validated['prova_ampliada'] ?? $pessoa->prova_ampliada,
                'prova_superampliada' => $validated['prova_superampliada'] ?? $pessoa->prova_superampliada,
                'cd_audio_deficiente_visual' => $validated['cd_audio_deficiente_visual'] ?? $pessoa->cd_audio_deficiente_visual,
                'prova_lingua_portuguesa_segunda_lingua' => $validated['prova_lingua_portuguesa_segunda_lingua'] ?? $pessoa->prova_lingua_portuguesa_segunda_lingua,
                'prova_video_libras' => $validated['prova_video_libras'] ?? $pessoa->prova_video_libras,
                'material_didatico_prova_braille' => $validated['material_didatico_prova_braille'] ?? $pessoa->material_didatico_prova_braille,
                'nenhum_recurso' => $validated['nenhum_recurso'] ?? $pessoa->nenhum_recurso,
                'numero_matricula_certidao_nascimento' => $validated['numero_matricula_certidao_nascimento'] ?? $pessoa->numero_matricula_certidao_nascimento,
                'pais_residencia' => $validated['pais_residencia'] ?? $pessoa->pais_residencia,
                'cep' => $validated['cep'] ?? $pessoa->cep,
                'municipio_residencia' => $validated['municipio_residencia'] ?? $pessoa->municipio_residencia,
                'localizacao_zona_residencia' => $validated['localizacao_zona_residencia'] ?? $pessoa->localizacao_zona_residencia,
                'localizacao_diferenciada_residencia' => $validated['localizacao_diferenciada_residencia'] ?? $pessoa->localizacao_diferenciada_residencia,
                'maior_nivel_escolaridade_concluido' => $validated['maior_nivel_escolaridade_concluido'] ?? $pessoa->maior_nivel_escolaridade_concluido,
                'tipo_ensino_medio_cursado' => $validated['tipo_ensino_medio_cursado'] ?? $pessoa->tipo_ensino_medio_cursado,
                'codigo_curso_1' => $validated['codigo_curso_1'] ?? $pessoa->codigo_curso_1,
                'ano_conclusao_1' => $validated['ano_conclusao_1'] ?? $pessoa->ano_conclusao_1,
                'instituicao_educacao_superior_1' => $validated['instituicao_educacao_superior_1'] ?? $pessoa->instituicao_educacao_superior_1,
                'codigo_curso_2' => $validated['codigo_curso_2'] ?? $pessoa->codigo_curso_2,
                'ano_conclusao_2' => $validated['ano_conclusao_2'] ?? $pessoa->ano_conclusao_2,
                'instituicao_educacao_superior_2' => $validated['instituicao_educacao_superior_2'] ?? $pessoa->instituicao_educacao_superior_2,
                'codigo_curso_3' => $validated['codigo_curso_3'] ?? $pessoa->codigo_curso_3,
                'ano_conclusao_3' => $validated['ano_conclusao_3'] ?? $pessoa->ano_conclusao_3,
                'instituicao_educacao_superior_3' => $validated['instituicao_educacao_superior_3'] ?? $pessoa->instituicao_educacao_superior_3,
                'area_conhecimento_componentes_curriculares_1' => $validated['area_conhecimento_componentes_curriculares_1'] ?? $pessoa->area_conhecimento_componentes_curriculares_1,
                'area_conhecimento_componentes_curriculares_2' => $validated['area_conhecimento_componentes_curriculares_2'] ?? $pessoa->area_conhecimento_componentes_curriculares_2,
                'area_conhecimento_componentes_curriculares_3' => $validated['area_conhecimento_componentes_curriculares_3'] ?? $pessoa->area_conhecimento_componentes_curriculares_3,
                'tipo_pos_graduacao_1' => $validated['tipo_pos_graduacao_1'] ?? $pessoa->tipo_pos_graduacao_1,
                'area_pos_graduacao_1' => $validated['area_pos_graduacao_1'] ?? $pessoa->area_pos_graduacao_1,
                'ano_conclusao_pos_graduacao_1' => $validated['ano_conclusao_pos_graduacao_1'] ?? $pessoa->ano_conclusao_pos_graduacao_1,
                'tipo_pos_graduacao_2' => $validated['tipo_pos_graduacao_2'] ?? $pessoa->tipo_pos_graduacao_2,
                'area_pos_graduacao_2' => $validated['area_pos_graduacao_2'] ?? $pessoa->area_pos_graduacao_2,
                'ano_conclusao_pos_graduacao_2' => $validated['ano_conclusao_pos_graduacao_2'] ?? $pessoa->ano_conclusao_pos_graduacao_2,
                'tipo_pos_graduacao_3' => $validated['tipo_pos_graduacao_3'] ?? $pessoa->tipo_pos_graduacao_3,
                'area_pos_graduacao_3' => $validated['area_pos_graduacao_3'] ?? $pessoa->area_pos_graduacao_3,
                'ano_conclusao_pos_graduacao_3' => $validated['ano_conclusao_pos_graduacao_3'] ?? $pessoa->ano_conclusao_pos_graduacao_3,
                'tipo_pos_graduacao_4' => $validated['tipo_pos_graduacao_4'] ?? $pessoa->tipo_pos_graduacao_4,
                'area_pos_graduacao_4' => $validated['area_pos_graduacao_4'] ?? $pessoa->area_pos_graduacao_4,
                'ano_conclusao_pos_graduacao_4' => $validated['ano_conclusao_pos_graduacao_4'] ?? $pessoa->ano_conclusao_pos_graduacao_4,
                'tipo_pos_graduacao_5' => $validated['tipo_pos_graduacao_5'] ?? $pessoa->tipo_pos_graduacao_5,
                'area_pos_graduacao_5' => $validated['area_pos_graduacao_5'] ?? $pessoa->area_pos_graduacao_5,
                'ano_conclusao_pos_graduacao_5' => $validated['ano_conclusao_pos_graduacao_5'] ?? $pessoa->ano_conclusao_pos_graduacao_5,
                'tipo_pos_graduacao_6' => $validated['tipo_pos_graduacao_6'] ?? $pessoa->tipo_pos_graduacao_6,
                'area_pos_graduacao_6' => $validated['area_pos_graduacao_6'] ?? $pessoa->area_pos_graduacao_6,
                'ano_conclusao_pos_graduacao_6' => $validated['ano_conclusao_pos_graduacao_6'] ?? $pessoa->ano_conclusao_pos_graduacao_6,
                'nao_tem_pos_graduacao_concluida' => $validated['nao_tem_pos_graduacao_concluida'] ?? $pessoa->nao_tem_pos_graduacao_concluida,
                'creche' => $validated['creche'] ?? $pessoa->creche,
                'pre_escola' => $validated['pre_escola'] ?? $pessoa->pre_escola,
                'anos_iniciais_ensino_fundamental' => $validated['anos_iniciais_ensino_fundamental'] ?? $pessoa->anos_iniciais_ensino_fundamental,
                'anos_finais_ensino_fundamental' => $validated['anos_finais_ensino_fundamental'] ?? $pessoa->anos_finais_ensino_fundamental,
                'ensino_medio' => $validated['ensino_medio'] ?? $pessoa->ensino_medio,
                'educacao_jovens_adultos' => $validated['educacao_jovens_adultos'] ?? $pessoa->educacao_jovens_adultos,
                'educacao_especial' => $validated['educacao_especial'] ?? $pessoa->educacao_especial,
                'educacao_indigena' => $validated['educacao_indigena'] ?? $pessoa->educacao_indigena,
                'educacao_campo' => $validated['educacao_campo'] ?? $pessoa->educacao_campo,
                'educacao_ambiental' => $validated['educacao_ambiental'] ?? $pessoa->educacao_ambiental,
                'educacao_direitos_humanos' => $validated['educacao_direitos_humanos'] ?? $pessoa->educacao_direitos_humanos,
                'educacao_bilingue_surdos' => $validated['educacao_bilingue_surdos'] ?? $pessoa->educacao_bilingue_surdos,
                'educacao_tecnologia_informacao_comunicacao' => $validated['educacao_tecnologia_informacao_comunicacao'] ?? $pessoa->educacao_tecnologia_informacao_comunicacao,
                'genero_diversidade_sexual' => $validated['genero_diversidade_sexual'] ?? $pessoa->genero_diversidade_sexual,
                'direitos_crianca_adolescente' => $validated['direitos_crianca_adolescente'] ?? $pessoa->direitos_crianca_adolescente,
                'educacao_relacoes_etnico_raciais_historia_afro' => $validated['educacao_relacoes_etnico_raciais_historia_afro'] ?? $pessoa->educacao_relacoes_etnico_raciais_historia_afro,
                'gestao_escolar' => $validated['gestao_escolar'] ?? $pessoa->gestao_escolar,
                'outros' => $validated['outros'] ?? $pessoa->outros,
                'nenhum' => $validated['nenhum'] ?? $pessoa->nenhum,
                'endereco_eletronico_email' => $validated['endereco_eletronico_email'] ?? $pessoa->endereco_eletronico_email,
                'escola_id' => $validated['escola_id'] ?? $pessoa->escola_id,
                'secretaria_id' => $validated['secretaria_id'] ?? $pessoa->secretaria_id,
            ]);

            return ApiResponse::success($pessoa, 'Pessoa atualizada com sucesso', 200);
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Pessoa não encontrada', 404);
        } catch (ValidationException $e) {
            return ApiResponse::error('Erro de validação', 422, $e->errors());
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao atualizar a pessoa', 500, $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'codigo_pessoa_fisica_sistema_proprio' => 'required',
                'data_nascimento' => 'required'
            ]);
            $data = DateTime::createFromFormat('Y-m-d', $credentials['data_nascimento']);
            $dataFormatada = $data->format('d-m-Y');
            $credentials['data_nascimento'] = $dataFormatada;
            $user = Pessoa::where($credentials)->first();
            if (!$user) {
                return ApiResponse::error('Credenciais inválidas!', 401);
            }
            $token = Auth::guard('pessoas')->login($user);
            return response()->json([
                'success' => true,
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'bearer',
            ]);
        } catch (ValidationException $e) {
            return ApiResponse::error('Credenciais inválidas!');
        } catch (\Exception $e) {
            return ApiResponse::error('Erro inesperado!', 500, $e->getMessage());
        }
    }
    public function getById($id)
    {
        try {
            $user = Pessoa::findOrFail($id);
            return ApiResponse::success($user, 'Usuário encontrado com sucesso!');
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('O Usuário não existe!', 404);
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao Buscar Usuário!');
        }
    }
}
