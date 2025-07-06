<?php
// app/Helpers/PermissionHelper.php

namespace App\Helpers;

use App\Helpers\ApiResponse as HelpersApiResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Responses\ApiResponse;

class PermissionHelper
{
    /**
     * Executa uma ação se o usuário tiver a permissão requerida
     *
     * @param string $permission Nome da permissão (ex: 'criar_escolas')
     * @param callable $action Callback a ser executado se permitido
     * @param string $guard Guard a ser verificado (default: 'pessoas')
     * @return mixed
     */
    public static function checkAndExecute(
        string $permission, 
        callable $action,
        string $guard = 'pessoas'
    ) {
        if (!Auth::guard($guard)->check()) {
            return HelpersApiResponse::error('Acesso não autorizado', 401);
        }

        $user = Auth::guard($guard)->user();

        if (!$user->can($permission)) {
            return HelpersApiResponse::error("Você não tem permissão para esta ação", 403);
        }

        return $action();
    }
}
