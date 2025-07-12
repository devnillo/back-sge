<?php

namespace App\Http\Controllers\Escola;

use App\Helpers\ApiResponse;
use App\Helpers\PermissionHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTurmaRequest;
use App\Http\Requests\UpdateEscolaRequest;
use App\Http\Requests\UpdateTurmaRequest;
use App\Http\Resources\EscolaResource;
use App\Http\Resources\TurmaResource;
use App\Models\Escola;
use App\Models\Turma;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TurmaController extends Controller
{
    public function register(StoreTurmaRequest $request)
    {
        $numero = str_pad(mt_rand(0, 99999999), 7, '0', STR_PAD_LEFT);
        try {
            $response = PermissionHelper::checkPermission('criar_turmas');
            if ($response) {
                return $response; 
            }
            $validated = $request->validated();
            $escola = Escola::findOrFail($validated['escola_id']);
            $turma = Turma::create([
                'tipo_registro' => '20',
                'codigo_escola_inep' => $validated['codigo_escola_inep'],
                'codigo_turma' => $numero,
                'codigo_turma_inep' => $validated['codigo_turma_inep'] ?? null,
                'nome_turma' => $validated['nome_turma'] ?? null,
                'tipo_medicao' => $validated['tipo_medicao'] ?? null,
                'horario_inicio' => $validated['horario_inicio'] ?? null,
                'horario_minuto_inicio' => $validated['horario_minuto_inicio'] ?? null,
                'municipio_codigo' => $validated['municipio_codigo'] ?? null,
                'horario_fim' => $validated['horario_fim'] ?? null,
                'horario_minuto_fim' => $validated['horario_minuto_fim'] ?? null,
                'domingo' => $validated['domingo'] ?? null,
                'segunda' => $validated['segunda'] ?? null,
                'terca' => $validated['terca'] ?? null,
                'quarta' => $validated['quarta'] ?? null,
                'quinta' => $validated['quinta'] ?? null,
                'sexta' => $validated['sexta'] ?? null,
                'sabado' => $validated['sabado']  ?? null,
                'escolarizacao' => $validated['escolarizacao'] ?? null,
                'atividade_complementar' => $validated['atividade_complementar'] ?? null,
                'atendimento_educacional_especial' => $validated['atendimento_educacional_especial'] ?? null,
                'formacao_geral_basica' => $validated['formacao_geral_basica'] ?? null,
                'itinerario_formativo' => $validated['itinerario_formativo'] ?? null,
                'nao_se_aplica' => $validated['nao_se_aplica'] ?? null,
                'atividade_complementar_codigo_1' => $validated['atividade_complementar_codigo_1'] ?? null,
                'atividade_complementar_codigo_2' => $validated['atividade_complementar_codigo_2'] ?? null,
                'atividade_complementar_codigo_3' => $validated['atividade_complementar_codigo_3'] ?? null,
                'atividade_complementar_codigo_4' => $validated['atividade_complementar_codigo_4'] ?? null,
                'atividade_complementar_codigo_5' => $validated['atividade_complementar_codigo_5'] ?? null,
                'atividade_complementar_codigo_6' => $validated['atividade_complementar_codigo_6'] ?? null,
                'local_funcionamento_diferenciado_turma' => $validated['local_funcionamento_diferenciado_turma'] ?? null,
                'modalidade' => $validated['modalidade'] ?? null,
                'etapa' => $validated['etapa'] ?? null,
                'codigo_curso' => $validated['codigo_curso'] ?? null,

                'serie_ano' => $validated['serie_ano'] ?? null,
                'periodos_semestrais' => $validated['periodos_semestrais'] ?? null,
                'ciclos' => $validated['ciclos'] ?? null,
                'grupos_nao_seriados' => $validated['grupos_nao_seriados'] ?? null,
                'modulos' => $validated['modulos'] ?? null,
                'alternancia_regular_periodos' => $validated['alternancia_regular_periodos'] ?? null,

                'eletivas' => $validated['eletivas'] ?? null,
                'libras' => $validated['libras'] ?? null,
                'lingua_indigina' => $validated['lingua_indigina'] ?? null,
                'lingua_estrangeira_espanhol' => $validated['lingua_estrangeira_espanhol'] ?? null,
                'lingua_estrangeira_frances' => $validated['lingua_estrangeira_frances'] ?? null,
                'lingua_estrangeira_outra' => $validated['lingua_estrangeira_outra'] ?? null,
                'projeto_vida' => $validated['projeto_vida'] ?? null,
                'trilhas_aprofundamento' => $validated['trilhas_aprofundamento'] ?? null,
                'outras_unidades_curriculares' => $validated['outras_unidades_curriculares'] ?? null,

                'quimica' => $validated['quimica'] ?? null,
                'fisica' => $validated['fisica'] ?? null,
                'matematica' => $validated['matematica'] ?? null,
                'biologia' => $validated['biologia'] ?? null,
                'ciencias' => $validated['ciencias'] ?? null,
                'portugues' => $validated['portugues'] ?? null,
                'ingles' => $validated['ingles'] ?? null,
                'espanhol' => $validated['espanhol'] ?? null,
                'outra_lingua_estrangeira' => $validated['outra_lingua_estrangeira'] ?? null,
                'arte' => $validated['arte'] ?? null,
                'educacao_fisica' => $validated['educacao_fisica'] ?? null,
                'historia' => $validated['historia'] ?? null,
                'geografia' => $validated['geografia'] ?? null,
                'filosofia' => $validated['filosofia'] ?? null,
                'informatica' => $validated['informatica'] ?? null,
                'areas_conhecimento_profissionalizantes' => $validated['areas_conhecimento_profissionalizantes'] ?? null,
                'materia_libras' => $validated['materia_libras'] ?? null,
                'areas_conhecimento_pedagogicas' => $validated['areas_conhecimento_pedagogicas'] ?? null,
                'ensino_religioso' => $validated['ensino_religioso'] ?? null,
                'materia_lingua_indigina' => $validated['lingua_indigina'] ?? null,
                'estudos_sociais' => $validated['estudos_sociais'] ?? null,
                'sociologia' => $validated['sociologia'] ?? null,
                'literatura_frances' => $validated['literatura_frances'] ?? null,
                'lingua_portuguesa_segunda_lingua' => $validated['lingua_portuguesa_segunda_lingua'] ?? null,
                'estagio_supervisionado' => $validated['estagio_supervisionado'] ?? null,
                'materia_projeto_vida' => $validated['projeto_vida'] ?? null,
                'materia_outras_unidades_curriculares' => $validated['materia_outras_unidades_curriculares'] ?? null,

                'classe_bilingue_surdos' => $validated['classe_bilingue_surdos'],
                'escola_id' => $validated['escola_id'],
            ]);
            return ApiResponse::success($turma, 'Turma criada com sucesso');
        } catch (ValidationException $e) {
            return ApiResponse::error('Erro de validação', 422, $e->errors());
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Escola não encontrada', 404);
        }
    }

    public function update(UpdateTurmaRequest $request, $id)
    {
        try {
            $response = PermissionHelper::checkPermission('editar_turmas');
            if ($response) {
                return $response; 
            }
            $validated = $request->validated();
            $turma = Turma::findOrFail($id);
            $turma->update($validated);

            return ApiResponse::success(TurmaResource::make($turma->fresh()), 'Turma atualizada com sucesso');
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Turma não encontrada', 404);
        } catch (ValidationException $e) {
            return ApiResponse::error('Erro de válidação', 422, $e->errors());
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao atualizar turma', 500, $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $response = PermissionHelper::checkPermission('excluir_turmas');
            if ($response) {
                return $response; 
            }
            $turma = Turma::findOrFail($id);
            
            $turma->delete();
            
            return ApiResponse::success(null, 'Turma deletada com sucesso');
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Turma não encontrada', 404);
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao deletar turma', 500, $e->getMessage());
        }
    }
    public function show($id)
    {
        
        try {
            $response = PermissionHelper::checkPermission('ver_turmas');
            if ($response) {
                return $response; 
            }
            $turma = Turma::with('pessoas')
                ->findOrFail($id);
            return ApiResponse::success(new TurmaResource($turma), 'turma encontrada com sucesso!');
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Turma não encontrada!', 404);
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao buscar turma!');
        }
    }
    public function showAllBySchoolId($id)
    {
        try {
            $response = PermissionHelper::checkPermission('ver_turmas');
            if ($response) {
                return $response; 
            }
            $turma = Turma::where('escola_id', '=', $id)->get();

            return ApiResponse::success(TurmaResource::collection($turma), 'turmas encontrada com sucesso!');
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Turma não encontrada!', 404);
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao buscar turma!');
        }
    }
}
