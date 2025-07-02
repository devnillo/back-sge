<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\EquipamentosUsadosAlunosAcesso;
use App\Models\InfraestruturaProfissionais;
use App\Models\InstrumentosMateriaisPedagogicos;
use App\Models\SistemaCotas;
use App\Models\TipoInternet;
use App\Models\TratamentoLixo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SistemaCotasController extends Controller
{
    public function register(Request $request)
    {
        try {
            $credentials = $request->validate([
                'cota_ppi' => 'required|max:1',
                'cota_renda' => 'required|max:1',
                'cota_escola_publica' => 'required|max:1',
                'cota_deficiencia' => 'required|max:1',
                'cota_outros_grupos' => 'required|max:1',
                'cota_ampla_concorrencia' => 'required|max:1',
                'escola_infra_id' => 'required',
            ]);
            $data = SistemaCotas::create([
                'cota_ppi' => $credentials['cota_ppi'],
                'cota_renda' => $credentials['cota_renda'],
                'cota_escola_publica' => $credentials['cota_escola_publica'],
                'cota_deficiencia' => $credentials['cota_deficiencia'],
                'cota_outros_grupos' => $credentials['cota_outros_grupos'],
                'cota_ampla_concorrencia' => $credentials['cota_ampla_concorrencia'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Sistema de cotas cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
