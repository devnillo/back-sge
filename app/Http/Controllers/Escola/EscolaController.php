<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEscolaRequest;
use App\Http\Requests\UpdateEscolaRequest;
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
                'situacao_funcionamento' => $validated['situacao_funcionamento'] ?? null,
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
                'localizacao_zona' => $validated['localizacao_zona'] ?? null,
                'localizacao_diferenciada' => $validated['localizacao_diferenciada'] ?? null,
                'dependencia_administrativa' => $validated['dependencia_administrativa'],
                'outro_telefone' => $validated['outro_telefone'] ?? null,
                'email_escola' => $validated['email_escola'] ?? null,
                'escola_indigena' => $validated['escola_indigena'] ?? null,
                'educacao_ambiental' => $validated['educacao_ambiental'] ?? null,
                'status' => $validated['status'] ?? null,
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
    public function update(UpdateEscolaRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $escola = Escola::findOrFail($id);
            $escola->update([
                'nome_escola' => $validated['nome_escola'] ?? $escola->nome_escola,
                'codigo_escola_inep' => $validated['codigo_escola_inep'] ?? $escola->codigo_escola_inep,
                'municipio_codigo' => $validated['municipio_codigo'] ?? $escola->municipio_codigo,
                'distrito_codigo' => $validated['distrito_codigo'] ?? $escola->distrito_codigo,
                'bairro' => $validated['bairro'] ?? $escola->bairro,
                'cep' => $validated['cep'] ?? $escola->cep,
                'endereco' => $validated['endereco'] ?? $escola->endereco,
                'numero' => $validated['numero'] ?? $escola->numero,
                'complemento' => $validated['complemento'] ?? $escola->complemento,
                'email_escola' => $validated['email_escola'] ?? $escola->email_escola,
                'dependencia_administrativa' => $validated['dependencia_administrativa'] ?? $escola->dependencia_administrativa,

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
    public function getAllBySecretaryId($id)
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

