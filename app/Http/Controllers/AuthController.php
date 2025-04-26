<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        if ($token = auth()->attempt($credentials)) {
            // $request->session()->regenerate();
            
            return response()->json([
                'success' => true,
                'user' => auth()->user(),
                'access_token' => $token,
                'token_type' => 'bearer',
            ]);
        }
        return response()->json(['error' => 'Unauthorized'], 401);

    }

    public function check(Request $request)
    {
        return response()->json(['status' => 'ok']);
    }
    public function refresh(Request $request)
    {   
        try {
            return $this->respondWithToken(auth('api')->refresh());
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
