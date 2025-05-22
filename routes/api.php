<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/check', [AuthController::class, 'check'])->middleware('auth:api');
Route::get('/refresh', [AuthController::class, 'refresh']);

// Route::get('/escolas', [EscolaController::class, 'getAll']);


// require __DIR__ . '/user-route.php';
require __DIR__ . '/escola-rota.php';
require __DIR__ . '/secretary-route.php';
require __DIR__ . '/pessoa-route.php';
