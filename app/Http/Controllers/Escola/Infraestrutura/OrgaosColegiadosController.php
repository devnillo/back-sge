<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\FonteEnergia;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrgaosColegiadosController extends Controller
{
    public function register(Request $request)
    {
        
        try {
            $credentials = $request->validate([
                'orgao_associacao_pais_mestres' => "required|max:1",
                'orgao_conselho_escolar' => "required|max:1",
                'orgao_gremio_estudantil' => "required|max:1",
                'orgao_outros' => "required|max:1",
                'orgao_nenhum' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = FonteEnergia::create([
                'orgao_associacao_pais_mestres' => $credentials['orgao_associacao_pais_mestres'],
                'orgao_conselho_escolar' => $credentials['orgao_conselho_escolar'],
                'orgao_gremio_estudantil' => $credentials['orgao_gremio_estudantil'],
                'orgao_outros' => $credentials['orgao_outros'],
                'orgao_nenhum' => $credentials['orgao_nenhum'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Orgaos Colegiados cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
