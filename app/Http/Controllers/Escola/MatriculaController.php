<?php

namespace App\Http\Controllers\Escola;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pessoa\PessoasController;
use App\Http\Requests\StorePessoaRequest;
use App\Models\Matricula;
use App\Models\Pessoa;
use App\Services\PessoaService;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;

class MatriculaController extends Controller
{
    public function register(Request $request, $escola_id, $turma_id)
    {
        try {
            $credentials = $request->validate([
                'turma_id' => 'required',
                'aluno_id' => 'required',
                'escola_id' =>'required',
                'motivo_transferencia' =>'max:200',
            ]);
            $matricula = Matricula::create($credentials);
            return ApiResponse::success($matricula, 'Matrícula cadastrada com sucesso', 201);
        } catch (ValidationException $e) {
            return ApiResponse::error('Erro de validação', 422, $e->errors());
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao cadastrar uma matrícula');
        }
    }
}
