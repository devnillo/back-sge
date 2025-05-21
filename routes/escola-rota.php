<?php

use App\Http\Controllers\Escola\Infraestrutura\AbastecimentoAguaInfraestruturaController;
use App\Http\Controllers\Escola\Infraestrutura\EscolaInfraestruturaController;
use App\Http\Controllers\Escola\EscolaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/escolas')->group(function () {
    Route::post('/register', [EscolaController::class, 'register']);
    Route::get('/{id}/all', [EscolaController::class, 'getAll']);
    Route::get('/{id}', [EscolaController::class, 'getById']);

    Route::prefix('/infraestrutura')->group(function () {
        Route::post('/register', [EscolaInfraestruturaController::class, 'register']);
        Route::post('/abastecimento-agua/register', [AbastecimentoAguaInfraestruturaController::class, 'register']);
    });
});
