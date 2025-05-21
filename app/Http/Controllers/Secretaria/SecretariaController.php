<?php

namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use App\Models\Escola;
use App\Models\Secretarias;
use Error;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SecretariaController extends Controller
{
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
    public function register(Request $request)
    {
        try {
            $validated = $request->validate(
                [
                    'nome' => 'required|string|max:255|unique:secretarias',
                    'email' => 'required|string|email|max:255|unique:secretarias',
                    'telefone' => 'string|max:255',
                    'senha' => 'required|string|max:255',
                    'cidade' => 'required|string|max:255',
                    'estado' => 'required|string|max:255',
                    'cep' => 'required|string|max:255',
                    'endereco' => 'required|string|max:255',
                ]
            );
            $secretaria = Secretarias::create([
                'nome' => $validated['nome'],
                'email' => $validated['email'],
                'telefone' => $validated['telefone'],
                'senha' => $validated['senha'],
                'cidade' => $validated['cidade'],
                'estado' => $validated['estado'],
                'cep' => $validated['cep'],
                'endereco' => $validated['endereco'],
            ]);
            return response()->json([
                'success' => true,
                'data' => $secretaria,
                'message' => 'Escola cadastrada com sucesso',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
                'message' => 'Erro ao cadastrar escola',
            ], 422);
        }
    }
    public function show($id)
    {
        try {
            $secretary = Secretarias::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $secretary,
            ], 200);
        } catch (Error $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao buscar secretaria',
            ], 404);
        }
    }
}
