<?php

namespace App\Http\Controllers\Escola\Infraestrutura;

use App\Http\Controllers\Controller;
use App\Models\AcessoInternet;
use App\Models\TratamentoLixo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AcessoInternetController extends Controller
{
    public function register(Request $request)
    {
        try {

            $credentials = $request->validate([
                'internet_uso_administrativo' => 'required|max:1',
                'internet_uso_ensino_aprendizagem' => "required|max:1",
                'internet_uso_alunos' => "required|max:1",
                'internet_uso_comunidade' => "required|max:1",
                'internet_nao_possui' => "required|max:1",
                'escola_infra_id' => "required"
            ]);
            $data = AcessoInternet::create([
                'internet_uso_administrativo' => $credentials['internet_uso_administrativo'],
                'internet_uso_ensino_aprendizagem' => $credentials['internet_uso_ensino_aprendizagem'],
                'internet_uso_alunos' => $credentials['internet_uso_alunos'],
                'internet_uso_comunidade' => $credentials['internet_uso_comunidade'],
                'internet_nao_possui' => $credentials['internet_nao_possui'],
                'escola_infra_id' => $credentials['escola_infra_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Acesso a Internet cadastrado/atualizado com sucesso'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
