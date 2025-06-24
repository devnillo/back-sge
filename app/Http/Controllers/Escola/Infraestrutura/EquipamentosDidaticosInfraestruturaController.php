<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\EquipamentosDidaticos;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EquipamentosDidaticosInfraestruturaController extends Controller
{

    public function register(Request $request)
    {
        try {
            $credentials = $request->validate([
                'equip_dvd_blu_ray' => 'required|max:1',
                'equip_som' => "required|max:1",
                'equip_televisao' => "required|max:1",
                'equip_lousa_digital' => "required|max:1",
                'equip_projetor_multimidia' => "required|max:1",
                'equip_scanner' => "required|max:1",
                'equip_nenhum_listado' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = EquipamentosDidaticos::create([
                'equip_dvd_blu_ray' => $credentials['equip_dvd_blu_ray'],
                'equip_som' => $credentials['equip_som'],
                'equip_televisao' => $credentials['equip_televisao'],
                'equip_lousa_digital' => $credentials['equip_lousa_digital'],
                'equip_projetor_multimidia' => $credentials['equip_projetor_multimidia'],
                'equip_scanner' => $credentials['equip_scanner'],
                'equip_nenhum_listado' => $credentials['equip_nenhum_listado'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Equipamentos de uso Didático cadastrada/atualizada com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
