<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\EquipamentosUsadosAlunosAcesso;
use App\Models\TipoInternet;
use App\Models\TratamentoLixo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EquipamentosUsadosAlunosAcessoController extends Controller
{
    public function register(Request $request)
    {
        try {

            $credentials = $request->validate([
                'internet_acesso_equipamentos_escola' => 'required|max:1',
                'internet_acesso_dispositivos_pessoais' => 'required|max:1',
                'escola_infra_id' => "required"
            ]);
            $data = EquipamentosUsadosAlunosAcesso::create([
                'internet_acesso_equipamentos_escola' => $credentials['internet_acesso_equipamentos_escola'],
                'internet_acesso_dispositivos_pessoais' => $credentials['internet_acesso_dispositivos_pessoais'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Equipamentos usados alunos acesso cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
