<?php

use App\Http\Controllers\Escola\Infraestrutura\AbastecimentoAguaInfraestruturaController;
use App\Http\Controllers\Escola\Infraestrutura\EscolaInfraestruturaController;
use App\Http\Controllers\Escola\EscolaController;
use App\Http\Controllers\Escola\Infraestrutura\AcessibilidadeInfraestruturaController;
use App\Http\Controllers\Escola\Infraestrutura\ComputadoresUsoAlunosInfraestruturaController;
use App\Http\Controllers\Escola\Infraestrutura\DependenciasFisicaInfraestruturaController;
use App\Http\Controllers\Escola\Infraestrutura\DestinacaoLixoInfraestruturaController;
use App\Http\Controllers\Escola\Infraestrutura\EquipamentosTecnicosAdministrativosInfraestruturaController;
use App\Http\Controllers\Escola\Infraestrutura\EsgotamentoInfraestruturaController;
use App\Http\Controllers\Escola\Infraestrutura\FonteEnergiaInfraestruturaController;
use App\Http\Controllers\Escola\Infraestrutura\SalasAulasInfraestruturaController;
use App\Models\DependenciasFisicas;
use App\Models\DestinacaoLixo;
use App\Models\EquipamentosDidaticos;
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
        Route::post('/depencias/registrar', [DependenciasFisicaInfraestruturaController::class, 'register']);
        Route::post('/acessibilidade/registrar', [AcessibilidadeInfraestruturaController::class, 'register']);
        Route::post('/salas-infraestrutura/registrar', [SalasAulasInfraestruturaController::class, 'register']);
        Route::post('/equipamentos-tecnicos-adminitrativos/registrar', [EquipamentosTecnicosAdministrativosInfraestruturaController::class, 'register']);
        Route::post('/equipamentos-didaticos/registrar', [EquipamentosDidaticos::class, 'register']);
        Route::post('/computadores-alunos/registrar', [ComputadoresUsoAlunosInfraestruturaController::class, 'register']);



    });
});
