<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StorePessoaRequest;
use App\Models\Pessoa;
use App\Models\Professor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessoresController extends Controller
{
    //
    public function register(StorePessoaRequest $storePessoaRequest)
    {
        DB::beginTransaction();
        try {
            $credentials = $storePessoaRequest->validated();
            $pessoa = Pessoa::create($credentials);
            $pessoa->role = 'professor';
            $pessoa->save();
            $professor = Professor::create([
                'escola_id' => $credentials['escola_id'] ?? null,
                'disciplina_id' => $credentials['disciplina_id'] ?? null,
                'horario_id' => $credentials['horario_id'] ?? null,
                'secretaria_id' => $credentials['secretaria_id'] ?? null,
                'turma_id' => $credentials['turma_id'] ?? null,
                'pessoa_id' => $pessoa->id,
            ]);
            $pessoa['professor'] = $professor;
            DB::commit();
            return ApiResponse::success($pessoa, 'Professor cadastrado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::error($e->getMessage(), 'Erro ao cadastrar professor!');
        }
    }
    public function update(StorePessoaRequest $storePessoaRequest, $id)
    {
        try {
            $pessoa = Pessoa::findOrFail($id);
            $pessoa->update($storePessoaRequest);
            if ($storePessoaRequest->has('professor')) {
                $professorData = $storePessoaRequest->only([
                    'escola_id',
                    'disciplina_id',
                    'horario_id',
                    'secretaria_id',
                    'turma_id'
                ]);
                $pessoa->professor()->update($professorData);
            }
            return ApiResponse::success($pessoa, 'Professor atualizado com sucesso!');
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Professor não encontrado.', 404);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), 'Erro ao atualizar professor!', 500);
        }
    }
    public function destroy($id)
    {
        try {
            $pessoa = Pessoa::findOrFail($id);
            $pessoa->delete();
            return ApiResponse::success($pessoa, 'Professor excluído com sucesso!');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), 'Erro ao excluir professor!');
        }
    }
    public function show($id)
    {
        try {
            $pessoa = Pessoa::where('role', 'professor')->findOrFail($id);
            return ApiResponse::success($pessoa, 'Professor encontrado com sucesso!');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), 'Erro ao encontrar professor!');
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error($e->getMessage(), 'Professor não encontrado!');
        }
    }
    public function showAllBySchoolId($escola_id)
    {
        try {
            $pessoas = Pessoa::where('escola_id', $escola_id)->where('role', 'professor')->get();
            return ApiResponse::success($pessoas, 'Professores encontrados com sucesso!');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), 'Erro ao encontrar professores!');
        }
    }
}
