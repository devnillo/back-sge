<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{

    public function register(Request $request)
    {

        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'role' => 'required|string',
        ], [
            'name.required' => 'Nome é obrigatório',
            'email.required' => 'Email é obrigatório',
            'email.email' => 'Informe um email válido',
            'email.unique' => 'Email já cadastrado',
            'password.required' => 'Senha é obrigatória',
        ]);
        if ($credentials) {
            try {
                $user = User::create([
                    'name' => $credentials['name'],
                    'email' => $credentials['email'],
                    'password' => $credentials['password'],
                    'role' => 'administrator',
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Usuário cadastrado com sucesso',
                ], 201);
            } catch (\Throwable $th) {
                return response()->json([
                    'error' => true,
                    'message' => $credentials
                ], 401);
            }
        }
    }



    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
