<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data = null, string $message = 'Operação realizada com sucesso', int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message
        ], $status);
    }

    public static function error(string $message = 'Erro interno', int $status = 500, $data = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'data' => $data,
            'message' => $message
        ], $status);
    }
}
