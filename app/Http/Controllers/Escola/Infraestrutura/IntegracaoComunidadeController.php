<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\EquipamentosUsadosAlunosAcesso;
use App\Models\IntegracaoComunidade;
use App\Models\TipoInternet;
use App\Models\TratamentoLixo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class IntegracaoComunidadeController extends Controller
{
    public function register(Request $request)
    {
        try {

            $credentials = $request->validate([
                'possui_comunicacao_digital' => 'required|max:1',
                'compartilha_espaco_comunidade' => 'required|max:1',
                'usa_espacos_entorno_para_atividades' => 'required|max:1',
                'escola_infra_id' => "required"
            ]);
            $data = IntegracaoComunidade::create([
                'possui_comunicacao_digital' => $credentials['possui_comunicacao_digital'],
                'compartilha_espaco_comunidade' => $credentials['compartilha_espaco_comunidade'],
                'usa_espacos_entorno_para_atividades' => $credentials['usa_espacos_entorno_para_atividades'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Integração com comunidade cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
