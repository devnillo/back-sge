<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\EsgotamentoSanitario;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EsgotamentoController extends Controller
{
    public function register(Request $request)
    {
        
        try {
            $credentials = $request->validate([
                'esgoto_rede_publica' => 'required|max:1',
                'esgoto_fossa_septica' => "required|max:1",
                'esgoto_fossa_rudimentar' => "required|max:1",
                'esgoto_nao_ha' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = EsgotamentoSanitario::create([
                'esgoto_rede_publica' => $credentials['esgoto_rede_publica'],
                'esgoto_fossa_septica' => $credentials['esgoto_fossa_septica'],
                'esgoto_fossa_rudimentar' => $credentials['esgoto_fossa_rudimentar'],
                'esgoto_nao_ha' => $credentials['esgoto_nao_ha'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Esgotamento cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
