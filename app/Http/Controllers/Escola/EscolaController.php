<?php

namespace App\Http\Controllers\Escola;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEscolaRequest;
use App\Http\Requests\UpdateEscolaRequest;
use App\Http\Resources\EscolaResource;
use App\Models\Escola;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EscolaController extends Controller
{
    public function register(StoreEscolaRequest $request)
    {

        $numero = str_pad(mt_rand(0, 99999999), 7, '0', STR_PAD_LEFT);
        try {
            if (Auth::guard('pessoas')->check()) {
                $user = Auth::guard('pessoas')->user();
                if ($user->can('criar_escolas')) {
                    $validated = $request->validated();
                    $escola = Escola::create([
                        'tipo_registro' => '00',
                        'secretaria_id' => $validated["secretaria_id"],
                        'codigo_escola_inep' => $validated['codigo_escola_inep'],
                        'nome_escola' => $validated['nome_escola'],
                        'situacao_funcionamento' => $validated['situacao_funcionamento'] ?? null,
                        'data_inicio_ano_letivo' => $validated['data_inicio_ano_letivo'] ?? null,
                        'data_termino_ano_letivo' => $validated['data_termino_ano_letivo'] ?? null,
                        'cep' => $validated['cep'],
                        'municipio_codigo' => $validated['municipio_codigo'],
                        'distrito_codigo' => $validated['distrito_codigo'],
                        'endereco' => $validated['endereco'],
                        'numero' => $validated['numero'],
                        'complemento' => $validated['complemento'] ?? null,
                        'bairro' => $validated['bairro'] ?? null,
                        'ddd' => $validated['ddd'] ?? null,
                        'telefone' => $validated['telefone'] ?? null,
                        'localizacao_zona' => $validated['localizacao_zona'] ?? null,
                        'localizacao_diferenciada' => $validated['localizacao_diferenciada'] ?? null,
                        'dependencia_administrativa' => $validated['dependencia_administrativa'],
                        'outro_telefone' => $validated['outro_telefone'] ?? null,
                        'email_escola' => $validated['email_escola'] ?? null,
                        'escola_indigena' => $validated['escola_indigena'] ?? null,
                        'educacao_ambiental' => $validated['educacao_ambiental'] ?? null,
                        'status' => 'ativa',
                    ]);
                    return ApiResponse::success($escola, 'Escola cadastrada com sucesso', 201);
                }
                return ApiResponse::error('Você não tem permissão para criar uma escola', 403);
            }
            return ApiResponse::error('Você não está autenticado', 401);
        } catch (ValidationException $e) {
            return ApiResponse::error('Erro de validação', 422, $e->errors());
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao cadastrar uma escola');
        }
    }
    public function update(UpdateEscolaRequest $request, $id)
    {
        try {
            if (Auth::guard('pessoas')->check()) {
                $user = Auth::guard('pessoas')->user();
                if ($user->can('editar_escolas')) {
                    $validated = $request->validated();
                    $escola = Escola::findOrFail($id);
                    $escola->update([
                        'nome_escola' => $validated['nome_escola'] ?? $escola->nome_escola,
                        'codigo_escola_inep' => $validated['codigo_escola_inep'] ?? $escola->codigo_escola_inep,
                        'municipio_codigo' => $validated['municipio_codigo'] ?? $escola->municipio_codigo,
                        'distrito_codigo' => $validated['distrito_codigo'] ?? $escola->distrito_codigo,
                        'bairro' => $validated['bairro'] ?? $escola->bairro,
                        'cep' => $validated['cep'] ?? $escola->cep,
                        'endereco' => $validated['endereco'] ?? $escola->endereco,
                        'numero' => $validated['numero'] ?? $escola->numero,
                        'complemento' => $validated['complemento'] ?? $escola->complemento,
                        'email_escola' => $validated['email_escola'] ?? $escola->email_escola,
                        'status' => $validated['status'] ?? $escola->status,
                        'dependencia_administrativa' => $validated['dependencia_administrativa'] ?? $escola->dependencia_administrativa,
                    ]);
                    return ApiResponse::success($escola, 'Escola atualizada com sucesso!');
                } 
                    return ApiResponse::error('Você não tem permissão para editar uma escola', 403);
            }
            return ApiResponse::error('Você não está autenticado', 401);
        } catch (ValidationException $e) {
            return ApiResponse::error('Erro de validação', 422, $e->errors());
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Escola não encontrada', 404);
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao atualizar escola', 500);
        }
    }
    public function destroy($id)
    {
        try {
            if (Auth::guard('pessoas')->check()) {
                $user = Auth::guard('pessoas')->user();
                if ($user->can('deletar_escolas')) {
                    $escola = Escola::findOrFail($id);
                    $escola->delete();
                    return ApiResponse::success('Escola deletada com sucesso');
                }
            }
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Escola não encontrada', 404);
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao deletar escola', 500);
        }
    }
    public function changeStatus(Request $request, $id)
    {
        try {
            $escola = Escola::findOrFail($id);
            $escola->update([
                'status' => $request->input('status'),
            ]);
            return ApiResponse::success('Status da escola atualizado com sucesso', $escola);
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Escola não encontrada', 404);
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao atualizar status da escola', 500);
        }
    }

    public function getAllBySecretaryId($id)
    {
        $escola = Escola::where('secretaria_id', '=', $id)->get();

        return EscolaResource::collection($escola);
    }
    public function getById($id)
    {
        try {
            $escola = Escola::findOrFail($id);
            return ApiResponse::success(new EscolaResource($escola), 'Escola encontrada com sucesso');
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Escola não encontrada',
            ], 404);
        }
    }
}
