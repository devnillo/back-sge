<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\EquipamentosUsadosAlunosAcesso;
use App\Models\LinguaEnsino;
use App\Models\TipoInternet;
use App\Models\TratamentoLixo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LinguasEnsinoController extends Controller
{
    public function register(Request $request)
    {
        try {

            $credentials = $request->validate([
                'ensino_lingua_indigena' => 'required|max:1',
                'ensino_lingua_portuguesa' => 'required|max:1',
                'codigo_lingua_indigena_1' => 'required|max:1',
                'codigo_lingua_indigena_2' => 'required|max:1',
                'codigo_lingua_indigena_3' => 'required|max:1',
                'escola_infra_id' => "required"
            ]);
            $data = LinguaEnsino::create([
                'ensino_lingua_indigena' => $credentials['ensino_lingua_indigena'],
                'ensino_lingua_portuguesa' => $credentials['ensino_lingua_portuguesa'],
                'codigo_lingua_indigena_1' => $credentials['codigo_lingua_indigena_1'],
                'codigo_lingua_indigena_2' => $credentials['codigo_lingua_indigena_2'],
                'codigo_lingua_indigena_3' => $credentials['codigo_lingua_indigena_3'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Linguas de ensino cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
