<?php

namespace App\Http\Controllers\Secretaria;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Escola;
use App\Models\Secretarias;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
                    'telefone' => 'string|max:255',
                    'municipio' => 'string|max:255',
                    'estado' => 'string|max:255',
                    'bairro' => 'max:255',
                    'endereco' => 'required|string|max:255',
                    'cep' => 'required|string|max:255',
                    'numero' => 'max:255',
                    'password' => 'required',
                ]
            );
            $secrataria = Secretarias::findOrFail($id);
            $secrataria->update([
                'nome' => $validated['nome'],
                'email' => $validated['email'],
                'telefone' => $validated['telefone'],
                'municipio' => $validated['municipio'],
                'estado' => $validated['estado'],
                'bairro' => $validated['bairro'],
                'endereco' => $validated['endereco'],
                'cep' => $validated['cep'],
                'numero' => $validated['numero'],
                'password' => Hash::make($validated['password']),
            ]);
            return ApiResponse::success($secrataria, 'Escola atualizada com sucesso!');
        } catch (ValidationException $e) {
            return ApiResponse::error('Dados Incorretos!', 422, $e->errors());
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
                    'municipio' => 'string|max:255',
                    'estado' => 'string|max:255',
                    'bairro' => 'max:255',
                    'endereco' => 'required|string|max:255',
                    'cep' => 'required|string|max:255',
                    'numero' => 'max:255',
                    'password' => 'required',
                ]

            );
            $secretaria = Secretarias::create([
                'nome' => $validated['nome'],
                'email' => $validated['email'],
                'telefone' => $validated['telefone'],
                'municipio' => $validated['municipio'],
                'estado' => $validated['estado'],
                'bairro' => $validated['bairro'],
                'endereco' => $validated['endereco'],
                'cep' => $validated['cep'],
                'numero' => $validated['numero'],
                'password' => Hash::make($validated['password']),
            ]);
            return ApiResponse::success($secretaria, 'Secretaria cadastrada com sucesso!');
        } catch (ValidationException $e) {
            return ApiResponse::error('Dados Incorretos!', 422, $e->errors());
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email é obrigatório',
            'email.email' => 'Informe um email válido',
            'password.required' => 'Senha é obrigatória',
        ]);
        try {
            if ($token = auth('secretaria')->attempt($credentials)) {
                // $request->session()->regenerate();

                return response()->json([
                    'success' => true,
                    'user' => auth('secretaria')->user(),
                    'access_token' => $token,
                    'token_type' => 'bearer',
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Email ou senha inválidos',
            ], 401);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    public function show($id)
    {
        try {
            $secretaria = Secretarias::findOrFail($id);
            return ApiResponse::success($secretaria, 'Secretaria encontrada!', 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Erro inesperado, tente novamente!');
        }
    }
}
