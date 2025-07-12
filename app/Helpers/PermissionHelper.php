<?php

namespace App\Helpers;

use App\Helpers\ApiResponse as HelpersApiResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Responses\ApiResponse;

class PermissionHelper
{
    public static function checkPermission($permission, $errorMessage = 'Você não tem permissão para realizar esta ação', $errorCode = 403)
    {
        if (Auth::guard('pessoas')->check()) {
            $user = Auth::guard('pessoas')->user();
            if (!$user->can($permission)) {
                return HelpersApiResponse::error($errorMessage, $errorCode);
            }
        }

        return null; // Retorna null se a permissão for concedida
    }
}
