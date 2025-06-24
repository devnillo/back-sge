<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\AbastecimentoAgua;
use App\Models\RecursosAcessibilidade;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AcessibilidadeInfraestruturaController extends Controller
{
    public function register(Request $request)
    {
        
        try {
            $credentials = $request->validate([
                'acess_corrimao_guarda_corpos' => 'required|max:1',
                'acess_elevador' => "required|max:1",
                'acess_pisos_tateis' => "required|max:1",
                'acess_portas_vao_80cm' => "required|max:1",
                'acess_rampas' => "required|max:1",
                'acess_sinalizacao_luminosa' => "required|max:1",
                'acess_sinalizacao_sonora' => "required|max:1",
                'acess_sinalizacao_tatil' => "required|max:1",
                'acess_sinalizacao_visual' => "required|max:1",
                'acess_nenhum_recurso_listado' => "max:1",
                'escola_infra_id' => "required"
            ]);
            $data = RecursosAcessibilidade::create([
                'acess_corrimao_guarda_corpos' => $credentials['acess_corrimao_guarda_corpos'],
                'acess_elevador' => $credentials['acess_elevador'],
                'acess_pisos_tateis' => $credentials['acess_pisos_tateis'],
                'acess_portas_vao_80cm' => $credentials['acess_portas_vao_80cm'],
                'acess_rampas' => $credentials['acess_rampas'],
                'acess_sinalizacao_luminosa' => $credentials['acess_sinalizacao_luminosa'],
                'acess_sinalizacao_sonora' => $credentials['acess_sinalizacao_sonora'],
                'acess_sinalizacao_tatil' => $credentials['acess_sinalizacao_tatil'],
                'acess_sinalizacao_visual' => $credentials['acess_sinalizacao_visual'],
                'acess_nenhum_recurso_listado' => $credentials['acess_nenhum_recurso_listado'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Acessibilidade cadastrada/atualizada com sucesso'
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
