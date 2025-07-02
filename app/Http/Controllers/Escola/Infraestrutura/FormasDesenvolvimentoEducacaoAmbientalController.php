<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\AcessoInternet;
use App\Models\FormasDesenvolvimentoEducacaoAmbiental;
use App\Models\TratamentoLixo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FormasDesenvolvimentoEducacaoAmbientalController extends Controller
{
    public function register(Request $request)
    {
        try {

            $credentials = $request->validate([
                'educ_ambiental_conteudo_curricular' => 'required|max:1',
                'educ_ambiental_componente_especifico' => "required|max:1",
                'educ_ambiental_eixo_estruturante' => "required|max:1",
                'educ_ambiental_eventos' => "required|max:1",
                'educ_ambiental_projetos_transversais' => "required|max:1",
                'educ_ambiental_nenhuma_opcao' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = FormasDesenvolvimentoEducacaoAmbiental::create([
                'educ_ambiental_conteudo_curricular' => $credentials['educ_ambiental_conteudo_curricular'],
                'educ_ambiental_componente_especifico' => $credentials['educ_ambiental_componente_especifico'],
                'educ_ambiental_eixo_estruturante' => $credentials['educ_ambiental_eixo_estruturante'],
                'educ_ambiental_eventos' => $credentials['educ_ambiental_eventos'],
                'educ_ambiental_projetos_transversais' => $credentials['educ_ambiental_projetos_transversais'],
                'educ_ambiental_nenhuma_opcao' => $credentials['educ_ambiental_nenhuma_opcao'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Formas de Desenvolvimento Educacional Ambiental cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
