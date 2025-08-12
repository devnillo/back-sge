<?php

namespace App\Http\Controllers\Escola;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pessoa\PessoasController;
use App\Http\Requests\StorePessoaRequest;
use App\Models\Matricula;
use App\Models\Pessoa;
use App\Services\PessoaService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MatriculaController extends Controller
{
    public function register(Request $request)
    {
        try {
            $credentials = $request->validate([
                'turma_id' => 'required',
                'aluno_id' => 'required',
                'escola_id' => 'required',
                'motivo_transferencia' => 'max:200',
                'cpf_responsavel' => 'required',
                'email_responsavel' => 'max:200',
                'telefone_responsavel' => 'max:200',
            ]);
            $aluno = Pessoa::find($credentials['aluno_id']);
            if ($aluno->role !== 'aluno') {
                return ApiResponse::error('A pessoa informada não é um aluno', 400);
            }

            $matricula = Matricula::create($credentials);
            return ApiResponse::success($matricula, 'Matrícula cadastrada com sucesso', 201);
        } catch (ValidationException $e) {
            return ApiResponse::error('Erro de validação', 422, $e->errors());
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao cadastrar uma matrícula', 500, $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $credentials = $request->validate([
                'turma_id' => 'required',
                'aluno_id' => 'required',
                'escola_id' => 'required',
                'motivo_transferencia' => 'max:200',
                'cpf_responsavel' => 'required|unique:responsaveis,cpf_responsavel,' . $request->input('responsavel_id'),
                'email_responsavel' => 'max:200',
                'telefone_responsavel' => 'max:200',
            ]);

            $matricula = Matricula::findOrFail($id);

            $aluno = Pessoa::find($credentials['aluno_id']);
            if (!$aluno || $aluno->role !== 'aluno') {
                return ApiResponse::error('A pessoa informada não é um aluno', 400);
            }

            $matricula->update($credentials);

            return ApiResponse::success($matricula, 'Matrícula atualizada com sucesso', 200);
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) { // Código de erro para violação de chave única
                return ApiResponse::error('O CPF do responsável já está cadastrado.', 400);
            }
            return ApiResponse::error('Erro ao atualizar a matrícula', 500, $e->getMessage());
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Matrícula não encontrada', 404);
        } catch (ValidationException $e) {
            return ApiResponse::error('Erro de validação', 422, $e->errors());
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao atualizar a matrícula', 500, $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            // Busca a matrícula pelo ID
            $matricula = Matricula::findOrFail($id);

            // Remove a matrícula
            $matricula->delete();

            return ApiResponse::success([], 'Matrícula removida com sucesso', 200);
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Matrícula não encontrada', 404);
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao remover a matrícula', 500, $e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $matricula = Matricula::with(['aluno', 'turma', 'escola'])
                ->findOrFail($id);

            return ApiResponse::success($matricula, 'Matrícula encontrada', 200);
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Matrícula não encontrada', 404);
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao buscar matrícula', 500, $e->getMessage());
        }
    }
}
