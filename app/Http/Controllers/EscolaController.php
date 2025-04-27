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
            'escolas' => $escolas,
        ], 200);
    }
    public function register(Request $request)
    {
        // // $credentials = $request->only('name', 'email', 'code', 'dependencia', 'password', 'admin_id');
        // $credentials = $request->validate([
        //     [
        //         'name' => 'required|string|max:255',
        //         'email' => 'required|string|email|max:255|unique:escolas',
        //         'code' => 'required|string|max:255',
        //         'dependencia' => 'required|string|max:255',
        //         // 'password' => 'required',
        //         'admin_id' => 'required',
        //     ],
        //     [
        //         'name.required' => 'Nome é obrigatório',
        //         'email.required' => 'Email é obrigatório',
        //         'email.unique' => 'Email já cadastrado',
        //         'email.email' => 'Informe um email válido',
        //         'password.required' => 'Senha é obrigatória',
        //     ]
        // ]);


        try {
            $validated = $request->validate(
                [
                    'name' => 'required|string|max:255|unique:escolas',
                    'email' => 'required|string|email|max:255|unique:escolas',
                    'code' => 'required|string|max:255',
                    'dependencia' => 'required|string|max:255',
                    // 'password' => 'required',
                    'admin_id' => 'required',
                ],
                [
                    'name.required' => 'Nome é obrigatório',
                    'email.required' => 'Email é obrigatório',
                    'email.unique' => 'Email já cadastrado',
                    'email.email' => 'Informe um email válido',
                    'password.required' => 'Senha é obrigatória',
                    'code.required' => 'Informe um Código',
                    'code.unique' => 'Email já cadastrado',
                ]
            );
            $user = Escola::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'code' => 'aaaaa',
                'dependencia' => $validated['dependencia'],
                // 'password' => Hash::make($credentials['password']),
                'admin_id' => $validated['admin_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Escola cadastrada com sucesso',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->errors(),
            ], 422);
        }
    }
}
