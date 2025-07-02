<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\EquipamentosUsadosAlunosAcesso;
use App\Models\InfraestruturaProfissionais;
use App\Models\InstrumentosMateriaisPedagogicos;
use App\Models\TipoInternet;
use App\Models\TratamentoLixo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class InstrumentosMateriaisPedagogicosController extends Controller
{
    public function register(Request $request)
    {
        try {

    
            $credentials = $request->validate([
                'mat_acervo_multimidia' => 'required|max:1',
                'mat_brinquedos_educacao_infantil' => 'required|max:1',
                'mat_materiais_cientificos' => 'required|max:1',
                'mat_equipamento_audio' => 'required|max:1',
                'mat_equipamento_agricola' => 'required|max:1',
                'mat_instrumentos_musicais' => 'required|max:1',
                'mat_atividades_culturais_artisticas' => 'required|max:1',
                'mat_educacao_profissional' => 'required|max:1',
                'mat_atividade_desportiva_recreacao' => 'required|max:1',
                'mat_educacao_bilingue_surdos' => 'required|max:1',
                'mat_educacao_escolar_indigena' => 'required|max:1',
                'mat_relacoes_etnico_raciais' => 'required|max:1',
                'mat_educacao_do_campo' => 'required|max:1',
                'mat_educacao_quilombola' => 'required|max:1',
                'mat_educacao_especial' => 'required|max:1',
                'mat_nenhum_listado' => 'required|max:1',
                'escola_infra_id' => "required"
            ]);
            $data = InstrumentosMateriaisPedagogicos::create([
                'mat_acervo_multimidia' => $credentials['mat_acervo_multimidia'],
                'mat_brinquedos_educacao_infantil' => $credentials['mat_brinquedos_educacao_infantil'],
                'mat_materiais_cientificos' => $credentials['mat_materiais_cientificos'],
                'mat_equipamento_audio' => $credentials['mat_equipamento_audio'],
                'mat_equipamento_agricola' => $credentials['mat_equipamento_agricola'],
                'mat_instrumentos_musicais' => $credentials['mat_instrumentos_musicais'],
                'mat_atividades_culturais_artisticas' => $credentials['mat_atividades_culturais_artisticas'],
                'mat_educacao_profissional' => $credentials['mat_educacao_profissional'],
                'mat_atividade_desportiva_recreacao' => $credentials['mat_atividade_desportiva_recreacao'],
                'mat_educacao_bilingue_surdos' => $credentials['mat_educacao_bilingue_surdos'],
                'mat_educacao_escolar_indigena' => $credentials['mat_educacao_escolar_indigena'],
                'mat_relacoes_etnico_raciais' => $credentials['mat_relacoes_etnico_raciais'],
                'mat_educacao_do_campo' => $credentials['mat_educacao_do_campo'],
                'mat_educacao_quilombola' => $credentials['mat_educacao_quilombola'],
                'mat_educacao_especial' => $credentials['mat_educacao_especial'],
                'mat_nenhum_listado' => $credentials['mat_nenhum_listado'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Materiais pedagógicos cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
