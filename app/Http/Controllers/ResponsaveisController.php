<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreResponsavelRequest;
use App\Models\Responsavel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ResponsaveisController extends Controller
{
    public function register(StoreResponsavelRequest $request, $id)
    {
        try {
            $credentials = $request->validated();
            $responsavel = Responsavel::where('cpf', $credentials['cpf'])->first();
            if ($responsavel) {
                return ApiResponse::error('Responsavel Cadastrado!', 400);
            }
            $credentials['pessoa_id'] = $id;
            $responsavel = Responsavel::create($credentials);
            return ApiResponse::success('Responsavel cadastrado com sucesso', $responsavel);
        } catch (ValidationException $e) {
            return ApiResponse::error('Erro de validação', 422, $e->errors());
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao cadastrar uma matrícula', 500, $e->getMessage());
        }
    }
}
