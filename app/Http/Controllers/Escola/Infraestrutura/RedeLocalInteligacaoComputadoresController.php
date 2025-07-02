<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\RedeLocalInteligacaoComputadores;
use App\Models\TratamentoLixo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RedeLocalInteligacaoComputadoresController extends Controller
{
    public function register(Request $request)
    {
        try {

            $credentials = $request->validate([
                'rede_local_cabo' => 'required|max:1',
                'rede_local_wireless' => "required|max:1",
                'rede_local_nao_ha' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = RedeLocalInteligacaoComputadores::create([
                'rede_local_cabo' => $credentials['rede_local_cabo'],
                'rede_local_wireless' => $credentials['rede_local_wireless'],
                'rede_local_nao_ha' => $credentials['rede_local_nao_ha'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Rede local de inteligacao a computadores cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
