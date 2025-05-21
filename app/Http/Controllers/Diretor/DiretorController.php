<?php

namespace App\Http\Controllers\Diretor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DiretorController extends Controller
{
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
            // $secretaria = ::create([
            //     'nome' => $validated['nome'],
            //     'email' => $validated['email'],
            //     'telefone' => $validated['telefone'],
            //     'senha' => $validated['senha'],
            //     'cidade' => $validated['cidade'],
            //     'estado' => $validated['estado'],
            //     'cep' => $validated['cep'],
            //     'endereco' => $validated['endereco'],
            // ]);
            // return response()->json([
            //     'success' => true,
            //     'data' => $secretaria,
            //     'message' => 'Escola cadastrada com sucesso',
            // ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
                'message' => 'Erro ao cadastrar escola',
            ], 422);
        }
    }
}
