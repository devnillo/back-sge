<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
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
        try{
            if ($token = auth()->attempt($credentials)) {
                // $request->session()->regenerate();
    
                return response()->json([
                    'success' => true,
                    'user' => auth()->user(),
                    'access_token' => $token,
                    'token_type' => 'bearer',
                ]);
            }
        }catch(ValidationException $e){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
    }
    public function check()
    {
        return response()->json(['status' => 'ok']);
    }
    public function refresh(Request $request)
    {
        try {
            $token = auth('api')->refresh();
            return $this->respondWithToken($token);
        } catch (JWTException $th) {
            return response()->json(['error' => 'Token não redrhs'], 401);
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
