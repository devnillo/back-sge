<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\EquipamentosTecnicosAdministrativos;
use App\Models\SalasAulas;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EquipamentosTecnicosAdministrativosInfraestruturaController extends Controller
{
    public function register(Request $request)
    {
        try {
            $credentials = $request->validate([
                'equip_antena_parabolica' => 'required|max:1',
                'equip_computadores' => "required|max:1",
                'equip_copiadora' => "required|max:1",
                'equip_impressora' => "required|max:1",
                'equip_impressora_multifuncional' => "required|max:1",
                'equip_scanner' => "required|max:1",
                'equip_nenhum_listado' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = EquipamentosTecnicosAdministrativos::create([
                'equip_antena_parabolica' => $credentials['equip_antena_parabolica'],
                'equip_computadores' => $credentials['equip_computadores'],
                'equip_copiadora' => $credentials['equip_copiadora'],
                'equip_impressora' => $credentials['equip_impressora'],
                'equip_impressora_multifuncional' => $credentials['equip_impressora_multifuncional'],
                'equip_scanner' => $credentials['equip_scanner'],
                'equip_nenhum_listado' => $credentials['equip_nenhum_listado'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Equipamentos Técnicos Administrativos cadastrada/atualizada com sucesso'
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
