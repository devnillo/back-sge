<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\TratamentoLixo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TratamentoLixoController extends Controller
{
    public function register(Request $request)
    {
        try {
            $credentials = $request->validate([
                'tratamento_separacao' => 'required|max:1',
                'tratamento_reaproveitamento' => "required|max:1",
                'tratamento_reciclagem' => "required|max:1",
                'tratamento_nao_faz' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = TratamentoLixo::create([
                'tratamento_separacao' => $credentials['tratamento_separacao'],
                'tratamento_reaproveitamento' => $credentials['tratamento_reaproveitamento'],
                'tratamento_reciclagem' => $credentials['tratamento_reciclagem'],
                'tratamento_nao_faz' => $credentials['tratamento_nao_faz'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Tratamento do Lixo cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
