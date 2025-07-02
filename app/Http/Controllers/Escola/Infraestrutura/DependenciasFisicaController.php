<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\DependenciasFisicas;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DependenciasFisicaController extends Controller
{
    public function register(Request $request)
    {

        try {
            $credentials = $request->validate([
                'dep_almoxarifado' => 'required|max:1',
                'dep_area_vegetacao_gramado' => "required|max:1",
                'dep_auditorio' => "required|max:1",
                'dep_banheiro' => "required|max:1",
                'dep_banheiro_acessivel_pcd' => "required|max:1",
                'dep_banheiro_educacao_infantil' => "required|max:1",
                'dep_banheiro_funcionarios' => "required|max:1",
                'dep_banheiro_vestiario_chuveiro' => "required|max:1",
                'dep_biblioteca' => "required|max:1",
                'dep_cozinha' => "required|max:1",
                'dep_despensa' => "required|max:1",
                'dep_dormitorio_aluno' => "required|max:1",
                'dep_dormitorio_professor' => "required|max:1",
                'dep_laboratorio_ciencias' => "required|max:1",
                'dep_laboratorio_informatica' => "required|max:1",
                'dep_laboratorio_educacao_profissional' => "required|max:1",
                'dep_parque_infantil' => "required|max:1",
                'dep_patio_coberto' => "required|max:1",
                'dep_patio_descoberto' => "required|max:1",
                'dep_piscina' => "required|max:1",
                'dep_quadra_esportes_coberta' => "required|max:1",
                'dep_quadra_esportes_descoberta' => "required|max:1",
                'dep_refeitorio' => "required|max:1",
                'dep_sala_repouso_aluno' => "required|max:1",
                'dep_sala_artes' => "required|max:1",
                'dep_sala_musica_coral' => "required|max:1",
                'dep_sala_danca' => "required|max:1",
                'dep_sala_multiuso' => "required|max:1",
                'dep_terreirao' => "required|max:1",
                'dep_viveiro_animais' => "required|max:1",
                'dep_sala_diretoria' => "required|max:1",
                'dep_sala_leitura' => "required|max:1",
                'dep_sala_professores' => "required|max:1",
                'dep_sala_recursos_multifuncionais' => "required|max:1",
                'dep_sala_secretaria' => "required|max:1",
                'dep_sala_oficinas_profissionais' => "required|max:1",
                'dep_estudio_gravacao_edicao' => "required|max:1",
                'dep_area_horta_plantio_agricultura' => "required|max:1",
                'dep_nenhuma_das_dependencias' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = DependenciasFisicas::create([
                'dep_almoxarifado' => $credentials['dep_almoxarifado'],
                'dep_area_vegetacao_gramado' => $credentials['dep_area_vegetacao_gramado'],
                'dep_auditorio' => $credentials['dep_auditorio'],
                'dep_banheiro' => $credentials['dep_banheiro'],
                'dep_banheiro_acessivel_pcd' => $credentials['dep_banheiro_acessivel_pcd'],
                'dep_banheiro_educacao_infantil' => $credentials['dep_banheiro_educacao_infantil'],
                'dep_banheiro_funcionarios' => $credentials['dep_banheiro_funcionarios'],
                'dep_banheiro_vestiario_chuveiro' => $credentials['dep_banheiro_vestiario_chuveiro'],
                'dep_biblioteca' => $credentials['dep_biblioteca'],
                'dep_cozinha' => $credentials['dep_cozinha'],
                'dep_despensa' => $credentials['dep_despensa'],
                'dep_dormitorio_aluno' => $credentials['dep_dormitorio_aluno'],
                'dep_dormitorio_professor' => $credentials['dep_dormitorio_professor'],
                'dep_laboratorio_ciencias' => $credentials['dep_laboratorio_ciencias'],
                'dep_laboratorio_informatica' => $credentials['dep_laboratorio_informatica'],
                'dep_laboratorio_educacao_profissional' => $credentials['dep_laboratorio_educacao_profissional'],
                'dep_parque_infantil' => $credentials['dep_parque_infantil'],
                'dep_patio_coberto' => $credentials['dep_patio_coberto'],
                'dep_patio_descoberto' => $credentials['dep_patio_descoberto'],
                'dep_piscina' => $credentials['dep_piscina'],
                'dep_quadra_esportes_coberta' => $credentials['dep_quadra_esportes_coberta'],
                'dep_quadra_esportes_descoberta' => $credentials['dep_quadra_esportes_descoberta'],
                'dep_refeitorio' => $credentials['dep_refeitorio'],
                'dep_sala_repouso_aluno' => $credentials['dep_sala_repouso_aluno'],
                'dep_sala_artes' => $credentials['dep_sala_artes'],
                'dep_sala_musica_coral' => $credentials['dep_sala_musica_coral'],
                'dep_sala_danca' => $credentials['dep_sala_danca'],
                'dep_sala_multiuso' => $credentials['dep_sala_multiuso'],
                'dep_terreirao' => $credentials['dep_terreirao'],
                'dep_viveiro_animais' => $credentials['dep_viveiro_animais'],
                'dep_sala_diretoria' => $credentials['dep_sala_diretoria'],
                'dep_sala_professores' => $credentials['dep_sala_professores'],
                'dep_sala_recursos_multifuncionais' => $credentials['dep_sala_recursos_multifuncionais'],
                'dep_sala_secretaria' => $credentials['dep_sala_secretaria'],
                'dep_sala_oficinas_profissionais' => $credentials['dep_sala_oficinas_profissionais'],
                'dep_estudio_gravacao_edicao' => $credentials['dep_estudio_gravacao_edicao'],
                'dep_area_horta_plantio_agricultura' => $credentials['dep_area_horta_plantio_agricultura'],
                'dep_sala_leitura' => $credentials['dep_quadra_esportes_descoberta'],
                'dep_nenhuma_das_dependencias' => $credentials['dep_quadra_esportes_descoberta'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Dependencia Física cadastrada/atualizada com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
