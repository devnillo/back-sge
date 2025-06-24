<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\FonteEnergia;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FonteEnergiaInfraestruturaController extends Controller
{
    public function register(Request $request)
    {
        
        try {
            $credentials = $request->validate([
                'energia_rede_publica' => 'required|max:1',
                'energia_gerador_combustivel_fossil' => "required|max:1",
                'energia_renergia_renovavel_ou_alternativaede_publica' => "required|max:1",
                'energia_nao_ha' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = FonteEnergia::create([
                'energia_rede_publica' => $credentials['energia_rede_publica'],
                'energia_gerador_combustivel_fossil' => $credentials['energia_gerador_combustivel_fossil'],
                'energia_renergia_renovavel_ou_alternativaede_publica' => $credentials['energia_renergia_renovavel_ou_alternativaede_publica'],
                'energia_nao_ha' => $credentials['energia_nao_ha'],
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
        return response()->json(['oii' => true]);
    }
}
