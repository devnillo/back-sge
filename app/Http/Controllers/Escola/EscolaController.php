<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEscolaRequest;
use App\Http\Resources\EscolaResource;
use App\Models\Escola;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EscolaController extends Controller
{
    public function register(StoreEscolaRequest $request)
    {
        $numero = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        try {
            $validated = $request->validated();
            $escola = Escola::create([
                'tipo_registro' => '00',
                'secretaria_id' => $validated["secretaria_id"],
                'codigo_escola_inep' => $validated['codigo_escola_inep'],
                'nome_escola' => $validated['nome_escola'],
                'situacao_funcionamento' => $validated['situacao_funcionamento'],
                'data_inicio_ano_letivo' => $validated['data_inicio_ano_letivo'] ?? null,
                'data_termino_ano_letivo' => $validated['data_termino_ano_letivo'] ?? null,
                'cep' => $validated['cep'],
                'municipio_codigo' => $validated['municipio_codigo'],
                'distrito_codigo' => $validated['distrito_codigo'],
                'endereco' => $validated['endereco'],
                'numero' => $validated['numero'],
                'complemento' => $validated['complemento'] ?? null,
                'bairro' => $validated['bairro'] ?? null,
                'ddd' => $validated['ddd'] ?? null,
                'telefone' => $validated['telefone'] ?? null,
                'localizacao_zona' => $validated['localizacao_zona'],
                'localizacao_diferenciada' => $validated['localizacao_diferenciada'],
                'dependencia_administrativa' => $validated['dependencia_administrativa'],
                'outro_telefone' => $validated['outro_telefone'] ?? null,
                'email_escola' => $validated['email_escola'] ?? null,
                'escola_indigena' => $validated['escola_indigena'],
                'educacao_ambiental' => $validated['educacao_ambiental']
            ]);
            return response()->json([
                'success' => true,
                'escola' => $validated,
                'message' => 'Escola cadastrada com sucesso',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->errors(),
            ], 422);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate(
                [
                    'nome' => 'required|string|max:255|unique:escolas,nome,' . $request->id,
                    'email' => 'required|email|max:255|unique:escolas,email,' . $request->id,
                    'codigo' => 'string|max:255',
                    'municipio' => 'string|max:255',
                    'distrito' => 'string|max:255',
                    'bairro' => 'max:255',
                    'cep' => 'required|string|max:255',
                    'endereco' => 'required|string|max:255',
                    'numero' => 'max:255',
                    'complemento' => 'max:255',
                    'dependencia' => 'required|string|max:255',
                    // 'password' => 'required',
                ]
            );
            $escola = Escola::findOrFail($id);
            $escola->update([
                'nome' => $validated['nome'],
                'codigo' => $validated['codigo'],
                'municipio' => $validated['municipio'],
                'distrito' => $validated['distrito'],
                'bairro' => $validated['bairro'],
                'cep' => $validated['cep'],
                'endereco' => $validated['endereco'],
                'numero' => $validated['numero'],
                'complemento' => $validated['complemento'],
                'email' => $validated['email'],
                'dependencia' => $validated['dependencia'],

            ]);
            return response()->json([
                'success' => true,
                'escola' => $escola,
                'message' => 'Escola edidata com sucesso',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->errors(),
            ], 422);
        }
    }
    public function getAll($id)
    {
        $escola = Escola::where('secretaria_id', '=', $id)->get();

        return EscolaResource::collection($escola);
    }
    public function getById($id)
    {
        $escola = Escola::where('id', '=', $id)->first();

        return new EscolaResource($escola);
    }
}

