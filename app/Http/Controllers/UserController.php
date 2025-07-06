<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Pessoas;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $credentials = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string',
                'secretary_id' => 'string|max:255',   
                'role' => 'string',
            ], [
                'name.required' => 'Nome é obrigatório',
                'email.required' => 'Email é obrigatório',
                'email.email' => 'Informe um email válido',
                'email.unique' => 'Email já cadastrado',
                'password.required' => 'Senha é obrigatória',
            ]);
            $user = User::create([
                'name' => $credentials['name'],
                'email' => $credentials['email'],
                'password' => $credentials['password'],
                'secretary_id' => $credentials['secretary_id'] ?? null,
            ]);
            return response()->json([
                'success' => true,
                'user' => $user,
                'message' => 'Usuário cadastrado com sucesso',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        } catch (QueryException $e) {
            return response()->json([
                'error' => true,
                'message' => 'Erro no banco de dados',
            ], 500);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Erro inesperado',
            ], 500);
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
