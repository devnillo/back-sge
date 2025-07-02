<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\EquipamentosUsadosAlunosAcesso;
use App\Models\InfraestruturaProfissionais;
use App\Models\TipoInternet;
use App\Models\TratamentoLixo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class InfraestruturaProfissionaisController extends Controller
{
    public function register(Request $request)
    {
        try {

            $credentials = $request->validate([
                'prof_agricultura_horta_plantio' => 'required|max:1',
                'prof_auxiliares_secretaria' => 'required|max:1',
                'prof_servicos_gerais' => 'required|max:1',
                'prof_biblioteca_leitura' => 'required|max:1',
                'prof_saude_urgencia_emergencia' => 'required|max:1',
                'prof_coordenador_turno' => 'required|max:1',
                'prof_fonoaudiologo' => 'required|max:1',
                'prof_nutricionista' => 'required|max:1',
                'prof_psicologo' => 'required|max:1',
                'prof_cozinha_alimentacao' => 'required|max:1',
                'prof_apoio_supervisao_pedagogica' => 'required|max:1',
                'prof_secretario_escolar' => 'required|max:1',
                'prof_segurança_patrimonial' => 'required|max:1',
                'prof_tecnologia_laboratorio_multimeios' => 'required|max:1',
                'prof_vice_diretor_gestor_administrativo' => 'required|max:1',
                'prof_orientador_comunitario' => 'required|max:1',
                'prof_interprete_libras' => 'required|max:1',
                'prof_revisor_braille_assistente_vidente' => 'required|max:1',
                'prof_nenhuma_funcao_listada' => 'required|max:1',
                'escola_infra_id' => "required"
            ]);
            $data = InfraestruturaProfissionais::create([
                'prof_agricultura_horta_plantio' => $credentials['prof_agricultura_horta_plantio'],
                'prof_auxiliares_secretaria' => $credentials['prof_auxiliares_secretaria'],
                'prof_servicos_gerais' => $credentials['prof_servicos_gerais'],
                'prof_biblioteca_leitura' => $credentials['prof_biblioteca_leitura'],
                'prof_saude_urgencia_emergencia' => $credentials['prof_saude_urgencia_emergencia'],
                'prof_coordenador_turno' => $credentials['prof_coordenador_turno'],
                'prof_fonoaudiologo' => $credentials['prof_fonoaudiologo'],
                'prof_nutricionista' => $credentials['prof_nutricionista'],
                'prof_psicologo' => $credentials['prof_psicologo'],
                'prof_cozinha_alimentacao' => $credentials['prof_cozinha_alimentacao'],
                'prof_apoio_supervisao_pedagogica' => $credentials['prof_apoio_supervisao_pedagogica'],
                'prof_secretario_escolar' => $credentials['prof_secretario_escolar'],
                'prof_segurança_patrimonial' => $credentials['prof_segurança_patrimonial'],
                'prof_tecnologia_laboratorio_multimeios' => $credentials['prof_tecnologia_laboratorio_multimeios'],
                'prof_vice_diretor_gestor_administrativo' => $credentials['prof_vice_diretor_gestor_administrativo'],
                'prof_orientador_comunitario' => $credentials['prof_orientador_comunitario'],
                'prof_interprete_libras' => $credentials['prof_interprete_libras'],
                'prof_revisor_braille_assistente_vidente' => $credentials['prof_revisor_braille_assistente_vidente'],
                'prof_nenhuma_funcao_listada' => $credentials['prof_nenhuma_funcao_listada'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Infraestrutura profissionais cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
