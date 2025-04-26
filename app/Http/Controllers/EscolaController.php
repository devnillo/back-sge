<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class EscolaController extends Controller
{
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
    public function all($id){
        $escolas = Escola::all()->where('admin_id', '=', $id);
        return response()->json([
            'success' => true,
            'escolas' => $escolas,
        ], 200);
    }
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:escolas',
            'password' => 'required',
            'admin_id' => 'required',
        ], [
            'name.required' => 'Nome é obrigatório',
            'email.required' => 'Email é obrigatório',
            'email.unique' => 'Email já cadastrado',
            'email.email' => 'Informe um email válido',
            'password.required' => 'Senha é obrigatória',
        ]);
        if ($credentials) {
            try {
                $user = Escola::create([
                    'name' => $credentials['name'],
                    'email' => $credentials['email'],
                    'password' => Hash::make($credentials['password']),
                    'admin_id' => $credentials['admin_id'],
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Escola cadastrada com sucesso',
                ], 201);
            } catch (Error $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erro ao cadastrar Escola',
                ], 500);
            }
        }
    }
}
