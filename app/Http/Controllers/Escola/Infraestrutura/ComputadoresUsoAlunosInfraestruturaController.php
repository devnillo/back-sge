<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\ComputadoresUsoAlunos;
use App\Models\SalasAulas;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ComputadoresUsoAlunosInfraestruturaController extends Controller
{
    public function register(Request $request)
    {
        try {
            $credentials = $request->validate([
                'comp_aluno_desktop' => 'required|max:1',
                'comp_aluno_portateis' => "required|max:1",
                'comp_aluno_tablets' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = ComputadoresUsoAlunos::create([
                'comp_aluno_desktop' => $credentials['comp_aluno_desktop'],
                'comp_aluno_portateis' => $credentials['comp_aluno_portateis'],
                'comp_aluno_tablets' => $credentials['comp_aluno_tablets'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Computadores uso Aluno cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
