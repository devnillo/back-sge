<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\TipoInternet;
use App\Models\TratamentoLixo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TipoInternetController extends Controller
{
    public function register(Request $request)
    {
        try {

            $credentials = $request->validate([
                'internet_banda_larga' => 'required|max:1',
                'escola_infra_id' => "required"
            ]);
            $data = TipoInternet::create([
                'internet_banda_larga' => $credentials['internet_banda_larga'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Tipo de Internet cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
