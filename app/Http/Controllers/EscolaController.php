<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Models\User;
use Error;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class EscolaController extends Controller
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
    public function show($id)
    {
        try {
            //code...
            $escola = Escola::find($id);
            return response()->json([
                'success' => true,
                'escola' => $escola,
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
                'message' => 'Escola não encontrada',
            ], 404);
        }
    }
    public function all($id)
    {
        $escolas = Escola::all()->where('admin_id', '=', $id);
        return response()->json([
            'success' => true,
            'escolas' => $escolas->users,
        ], 200);
    }
    public function register(Request $request)
    {
        $numero = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        try {
            $validated = $request->validate(
                [
                    'nome' => 'string|max:255|unique:escolas',
                    'email' => 'string|email|max:255|unique:escolas',
                    'inep' => 'string|max:255',
                    'municipio' => 'string|max:255',
                    'distrito' => 'string|max:255',
                    'bairro' => 'max:255',
                    'cep' => 'required|string|max:255',
                    'endereco' => 'required|string|max:255',
                    'numero' => 'max:255',
                    'complemento' => 'max:255',
                    'dependencia' => 'required|string|max:255',
                    // 'password' => 'required',
                    'admin_id' => 'required',
                ]
            );
            $escola = Escola::create([
                'nome' => $validated['nome'],
                'inep' => $validated['inep'],
                'municipio' => $validated['municipio'],
                'distrito' => $validated['distrito'],
                'bairro' => $validated['bairro'],
                'cep' => $validated['cep'],
                'endereco' => $validated['endereco'],
                'numero' => $validated['numero'],
                'complemento' => $validated['complemento'],
                'email' => $validated['email'],
                'dependencia' => $validated['dependencia'],
                'password' => Hash::make($numero),
                'admin_id' => $validated['admin_id'],
            ]);
            return response()->json([
                'success' => true,
                'es' => $validated['nome'],
                'message' => 'Escola cadastrada com sucesso',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $validated['cep'],
            ], 422);
        }
    }
}
