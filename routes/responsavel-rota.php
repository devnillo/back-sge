<?php

use App\Http\Controllers\Pessoa\PessoasController;
use App\Http\Controllers\ResponsaveisController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/responsavel')->group(function () {
    Route::post('/register', [ResponsaveisController::class, 'register']);
    Route::post('/update/{id}', [ResponsaveisController::class, 'update']); 
    Route::post('/login', [ResponsaveisController::class, 'login']);
    Route::get('/{id}', [ResponsaveisController::class, 'getById']);
    Route::delete('/{id}', [ResponsaveisController::class, 'delete']);
});
