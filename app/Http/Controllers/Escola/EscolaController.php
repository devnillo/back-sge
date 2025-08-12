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
            if(!$this->isAuthenticated()){
                return ApiResponse::error('Você não está autenticado', 401);
            }
            if(!$this->hasCriarPermissao()){
                return ApiResponse::error('Você não tem permissão para criar uma escola', 403);
            }
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
        } catch (ValidationException $e) {
            return ApiResponse::error('Erro de validação', 422, $e->errors());
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao cadastrar uma escola' . $e->getMessage());
        }
    }
    public function update(UpdateEscolaRequest $request, $id)
    {
        try {
            if (!$this->hasEditarPermissao()) {  
                return ApiResponse::error('Você não tem permissão para editar uma escola', 403);
            }
            if (!$this->isAuthenticated()) {
                return ApiResponse::error('Você não está autenticado', 401);
            }
            $validated = $request->validated();

            // Encontra a escola ou lança uma exceção se não for encontrada
            $escola = Escola::findOrFail($id);

            // Prepara os dados para atualização
            $dataToUpdate = array_merge($escola->toArray(), array_filter($validated));
            // Atualiza a escola
            $escola->update($dataToUpdate);
            return ApiResponse::success($escola, 'Escola atualizada com sucesso!');
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
            if (!$this->hasExcluirPermissao()) {
                return ApiResponse::error('Você não tem permissão para excluir uma escola', 403);
            }
            if (!$this->isAuthenticated()) {
                return ApiResponse::error('Você não está autenticado', 401);
            }
            $escola = Escola::findOrFail($id);
            $escola->delete();
            return ApiResponse::success('Escola deletada com sucesso');
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Escola não encontrada', 404);
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao deletar escola', 500);
        }
    }
    public function changeStatus(Request $request, $id)
    {
        try {
            if (!$this->hasEditarPermissao()) {
                return ApiResponse::error('Você não tem permissão para editar uma escola', 403);
            }
            if (!$this->isAuthenticated()) {
                return ApiResponse::error('Você não está autenticado', 401);
            }
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
        try {
            if (!$this->hasVerPermissao()) {
                return ApiResponse::error('Você não tem permissão para ver uma escola', 403);
            }
            if (!$this->isAuthenticated()) {
                return ApiResponse::error('Você não está autenticado', 401);
            }
            $escolas = Escola::where('secretaria_id', '=', $id)->get();
            if ($escolas->isEmpty()) {
                return ApiResponse::error('Nenhuma escola encontrada', 404);
            }
            return ApiResponse::success(EscolaResource::collection($escolas), 'Escola(s) encontrada com sucesso');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao buscar escola',
            ], 500);
        }
    }
    public function getByWord($word)
    {
        try {
            if (!$this->hasVerPermissao()) {
                return ApiResponse::error('Você não tem permissão para ver uma escola', 403);
            }
            if (!$this->isAuthenticated()) {
                return ApiResponse::error('Você não está autenticado', 401);
            }
            $escolas = Escola::query()
                ->when($word, function ($query, $word) {
                    $query->where('id', '=', $word)
                        ->orWhere('nome_escola', 'like', "%{$word}%")
                        ->orWhere('codigo_escola_inep', '=', $word)
                        ->orWhere('bairro', 'like', "%{$word}%");
                })
                ->get();
            return ApiResponse::success(EscolaResource::collection($escolas), 'Escola(s) encontrada com sucesso');
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Escola não encontrada',
            ], 404);
        }
    }

    private function isAuthenticated()
    {
        return Auth::guard('pessoas')->check();
    }
    private function hasEditarPermissao()
    {
        $user = Auth::guard('pessoas')->user();
        return $user && $user->can('editar_escolas');
    }
    private function hasCriarPermissao()
    {
        $user = Auth::guard('pessoas')->user();
        return $user && $user->can('criar_escolas');
    }
    private function hasExcluirPermissao()
    {
        $user = Auth::guard('pessoas')->user();
        return $user && $user->can('excluir_escolas');
    }
    private function hasVerPermissao()
    {
        $user = Auth::guard('pessoas')->user();
        return $user && $user->can('ver_escolas');
    }
}
