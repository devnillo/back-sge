<?php

use App\Http\Controllers\Pessoa\PessoasController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/pessoas')->group(function () {
    Route::post('/registrar', [PessoasController::class, 'register']);

    Route::get('/{id}', [UserController::class, 'getById']);
});
