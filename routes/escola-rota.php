<?php

use App\Http\Controllers\Escola\Infraestrutura\AbastecimentoAguaInfraestruturaController;
use App\Http\Controllers\Escola\Infraestrutura\EscolaInfraestruturaController;
use App\Http\Controllers\Escola\EscolaController;
use App\Http\Controllers\Escola\Infraestrutura\DestinacaoLixoInfraestruturaController;
use App\Http\Controllers\Escola\Infraestrutura\EsgotamentoInfraestruturaController;
use App\Http\Controllers\Escola\Infraestrutura\FonteEnergiaInfraestruturaController;
use App\Models\DestinacaoLixo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('escolas')->group(function () {
    Route::post('/registrar', [EscolaController::class, 'register']);
    Route::post('/atualizar/{id}', [EscolaController::class, 'update']);
    Route::get('secretaria/{id}/escolas', [EscolaController::class, 'getAllBySecretaryId']);
    Route::get('/{id}', [EscolaController::class, 'getById']);



    Route::prefix('/infraestrutura')->group(function () {
        Route::post('/registrar', [EscolaInfraestruturaController::class, 'register']);

        Route::post('/abastecimento-agua/registrar', [AbastecimentoAguaInfraestruturaController::class, 'register']);
        Route::post('/fonte-energia/registrar', [FonteEnergiaInfraestruturaController::class, 'register']);
        Route::post('/esgotamento/registrar', [EsgotamentoInfraestruturaController::class, 'register']);
        Route::post('/destinacao-lixo/registrar', [DestinacaoLixoInfraestruturaController::class, 'register']);
        Route::post('/tratamento-lixo/registrar', [DestinacaoLixoInfraestruturaController::class, 'register']);


    });
});
