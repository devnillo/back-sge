<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\SalasAulas;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SalasAulasController extends Controller
{
    public function register(Request $request)
    {
     
        try {
            $credentials = $request->validate([
                'qtd_salas_utilizadas_predio_escolar' => 'required|max:1',
                'qtd_salas_utilizadas_fora_predio' => "required|max:1",
                'qtd_salas_climatizadas' => "required|max:1",
                'qtd_salas_acessiveis_pcd' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = SalasAulas::create([
                'qtd_salas_utilizadas_predio_escolar' => $credentials['qtd_salas_utilizadas_predio_escolar'],
                'qtd_salas_utilizadas_fora_predio' => $credentials['qtd_salas_utilizadas_fora_predio'],
                'qtd_salas_climatizadas' => $credentials['qtd_salas_climatizadas'],
                'qtd_salas_acessiveis_pcd' => $credentials['qtd_salas_acessiveis_pcd'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Fonte Energia cadastrada/atualizada com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
