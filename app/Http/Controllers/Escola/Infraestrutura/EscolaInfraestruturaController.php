<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\EscolaInfraestrutura;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EscolaInfraestruturaController extends Controller
{
    public function register(Request $request)
    {
        
        try {
            $credentials = $request->validate([
                'codigo_escola_inep' => 'required|max:8|unique:escola_infraestruturas',
                'predio_escolar' => 'max:1|required',
                'salas_em_outra_escola' => 'max:1|required',
                'galpao_rancho_paiol_barracao' => 'max:1|required',
                'unidade_atendimento_socioeducativa' => 'max:1|required',
                'unidade_prisional' => 'max:1|required',
                'outros_locais_funcionamento' => 'max:1|required',
                'forma_ocupacao_predio' => 'max:1',
                'predio_compartilhado_outra_escola' => 'max:1',
                'codigo_escola_compartilha_1' => 'max:8',
                'codigo_escola_compartilha_2' => 'max:8',
                'codigo_escola_compartilha_3' => 'max:8',
                'codigo_escola_compartilha_4' => 'max:8',
                'codigo_escola_compartilha_5' => 'max:8',
                'codigo_escola_compartilha_6' => 'max:8',
                'alimentacao_escolar_alunos' => 'max:1|required',
                'escola_id' => 'required',
        ]);
            $user = EscolaInfraestrutura::create([
                'codigo_escola_inep' => $credentials['codigo_escola_inep'],
                'predio_escolar' => $credentials['predio_escolar'],
                'salas_em_outra_escola' => $credentials['salas_em_outra_escola'],
                'galpao_rancho_paiol_barracao' => $credentials['galpao_rancho_paiol_barracao'],
                'unidade_atendimento_socioeducativa' => $credentials['unidade_atendimento_socioeducativa'],
                'unidade_prisional' => $credentials['unidade_prisional'],
                'outros_locais_funcionamento' => $credentials['outros_locais_funcionamento'],
                'forma_ocupacao_predio' => $credentials['forma_ocupacao_predio'],
                'predio_compartilhado_outra_escola' => $credentials['predio_compartilhado_outra_escola'],
                'codigo_escola_compartilha_1' => $credentials['codigo_escola_compartilha_1'] ?? null,
                'codigo_escola_compartilha_2' => $credentials['codigo_escola_compartilha_2'] ?? null,
                'codigo_escola_compartilha_3' => $credentials['codigo_escola_compartilha_3'] ?? null,
                'codigo_escola_compartilha_4' => $credentials['codigo_escola_compartilha_4'] ?? null,
                'codigo_escola_compartilha_5' => $credentials['codigo_escola_compartilha_5'] ?? null,
                'codigo_escola_compartilha_6' => $credentials['codigo_escola_compartilha_6'] ?? null,
                'alimentacao_escolar_alunos' => $credentials['alimentacao_escolar_alunos'],
                'escola_id' => $credentials['escola_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Infraestrutura cadastrada com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
        return response()->json(['oii' => true]);
    }
}
