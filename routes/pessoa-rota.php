<?php

use App\Http\Controllers\Pessoa\PessoasController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/pessoas')->group(function () {
    Route::post('/register', [PessoasController::class, 'register']);
    Route::post('/update/{id}', [PessoasController::class, 'update']);
    Route::post('/login', [PessoasController::class, 'login']);
    Route::get('/{id}', [PessoasController::class, 'getById']);
    Route::delete('/{id}', [PessoasController::class, 'delete']);
});
