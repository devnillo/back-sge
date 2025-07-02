<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\DestinacaoLixo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DestinacaoLixoController extends Controller
{
    public function register(Request $request)
    {
        try {
            $credentials = $request->validate([
                'lixo_servico_coleta' => 'required|max:1',
                'lixo_queima' => "required|max:1",
                'lixo_destinacao_final_licenciada' => "required|max:1",
                'lixo_descarta_outra_area' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = DestinacaoLixo::create([
                'lixo_servico_coleta' => $credentials['lixo_servico_coleta'],
                'lixo_queima' => $credentials['lixo_queima'],
                'lixo_destinacao_final_licenciada' => $credentials['lixo_destinacao_final_licenciada'],
                'lixo_descarta_outra_area' => $credentials['lixo_descarta_outra_area'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Destinação do Lixo cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
