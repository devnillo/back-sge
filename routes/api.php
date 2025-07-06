<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);
Route::get('/users/{id}', [UserController::class, 'getById']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/check', [AuthController::class, 'check'])->middleware('auth:api');
Route::get('/refresh', [AuthController::class, 'refresh']);
Route::middleware('auth:pessoas')->get('/teste-auth', function () {
    $user = Auth::guard('pessoas')->user();

    return response()->json([
        'auth' => true,
        'id' => $user->id,
        'nome' => $user->name,
        'email' => $user->email,
        'roles' => $user->getRoleNames(),
        'permissions' => $user->getPermissionNames(),
    ]);
});
// Route::get('/escolas', [EscolaController::class, 'getAll']);


// require __DIR__ . '/user-route.php';
require __DIR__ . '/escola-rota.php';
require __DIR__ . '/secretaria-route.php';
require __DIR__ . '/pessoa-rota.php';
