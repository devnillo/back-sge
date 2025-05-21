<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\AbastecimentoAgua;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AbastecimentoAguaInfraestruturaController extends Controller
{
    public function register(Request $request)
    {
        try {
            $credentials = $request->validate([
                'fornece_agua_potavel' => 'required|max:1',
                'agua_rede_publica' => "required|max:1",
                'agua_poco_artesiano' => "required|max:1",
                'agua_cacimba_cisterna_poco' => "required|max:1",
                'agua_fonte_rio_igarape_riacho_corrego' => "required|max:1",
                'agua_carro_pipa' => "required|max:1",
                'agua_nao_ha_abastecimento' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = AbastecimentoAgua::create([
                'fornece_agua_potavel' => $credentials['fornece_agua_potavel'],
                'agua_rede_publica' => $credentials['agua_rede_publica'],
                'agua_poco_artesiano' => $credentials['agua_poco_artesiano'],
                'agua_cacimba_cisterna_poco' => $credentials['agua_cacimba_cisterna_poco'],
                'agua_fonte_rio_igarape_riacho_corrego' => $credentials['agua_fonte_rio_igarape_riacho_corrego'],
                'agua_carro_pipa' => $credentials['agua_carro_pipa'],
                'agua_nao_ha_abastecimento' => $credentials['agua_nao_ha_abastecimento'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'cadastrada com sucesso'
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
