<?php

use App\Http\Controllers\Escola\Infraestrutura\EscolaInfraestruturaController;
use App\Http\Controllers\Escola\EscolaController;
use App\Http\Controllers\Escola\Infraestrutura\AcessibilidadeController;
use App\Http\Controllers\Escola\Infraestrutura\AcessoInternetController;
use App\Http\Controllers\Escola\Infraestrutura\ComputadoresUsoAlunosController;
use App\Http\Controllers\Escola\Infraestrutura\DependenciasFisicaController;
use App\Http\Controllers\Escola\Infraestrutura\DestinacaoLixoController;
use App\Http\Controllers\Escola\Infraestrutura\EquipamentosDidaticosController;
use App\Http\Controllers\Escola\Infraestrutura\EquipamentosTecnicosAdministrativosController;
use App\Http\Controllers\Escola\Infraestrutura\EquipamentosUsadosAlunosAcessoController;
use App\Http\Controllers\Escola\Infraestrutura\EsgotamentoController;
use App\Http\Controllers\Escola\Infraestrutura\FonteEnergiaController;
use App\Http\Controllers\Escola\Infraestrutura\FormasDesenvolvimentoEducacaoAmbientalController;
use App\Http\Controllers\Escola\Infraestrutura\InfraestruturaProfissionaisController;
use App\Http\Controllers\Escola\Infraestrutura\InstrumentosMateriaisPedagogicosController;
use App\Http\Controllers\Escola\Infraestrutura\IntegracaoComunidadeController;
use App\Http\Controllers\Escola\Infraestrutura\LinguasEnsinoController;
use App\Http\Controllers\Escola\Infraestrutura\OrgaosColegiadosController;
use App\Http\Controllers\Escola\Infraestrutura\RedeLocalInteligacaoComputadoresController;
use App\Http\Controllers\Escola\Infraestrutura\SalasAulasController;
use App\Http\Controllers\Escola\Infraestrutura\SistemaCotasController;
use App\Http\Controllers\Escola\Infraestrutura\TipoInternetController;
use App\Http\Controllers\Escola\Infraestrutura\TratamentoLixoController;
use App\Http\Controllers\Escola\TurmaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('escolas')->group(function () {
    Route::post('/register', [EscolaController::class, 'register']);
    Route::post('/atualizar/{id}', [EscolaController::class, 'update']);
    Route::delete('/deletar/{id}', [EscolaController::class, 'destroy']);
    Route::post('/status/{id}', [EscolaController::class, 'changeStatus']);
    Route::get('secretaria/{id}/escolas', [EscolaController::class, 'getAllBySecretaryId']);
    Route::get('/{id}', [EscolaController::class, 'getById']);

    Route::prefix('/infraestrutura')->group(function () {
        Route::post('/registrar', [EscolaInfraestruturaController::class, 'register']);

        Route::post('/abastecimento-agua/registrar', [TratamentoLixoController::class, 'register']);
        Route::post('/fonte-energia/registrar', [FonteEnergiaController::class, 'register']);
        Route::post('/esgotamento/registrar', [EsgotamentoController::class, 'register']);
        Route::post('/destinacao-lixo/registrar', [DestinacaoLixoController::class, 'register']);
        Route::post('/tratamento-lixo/registrar', [TratamentoLixoController::class, 'register']);
        Route::post('/depencias/registrar', [DependenciasFisicaController::class, 'register']);
        Route::post('/acessibilidade/registrar', [AcessibilidadeController::class, 'register']);
        Route::post('/salas-infraestrutura/registrar', [SalasAulasController::class, 'register']);
        Route::post('/equipamentos-tecnicos-adminitrativos/registrar', [EquipamentosTecnicosAdministrativosController::class, 'register']);
        Route::post('/equipamentos-didaticos/registrar', [EquipamentosDidaticosController::class, 'register']);
        Route::post('/computadores-alunos/registrar', [ComputadoresUsoAlunosController::class, 'register']);
        Route::post('/acesso-internet/registrar', [AcessoInternetController::class, 'register']);
        Route::post('/tipo-internet/registrar', [TipoInternetController::class, 'register']);
        Route::post('/rede-local-inteligacao-computadores/registrar', [RedeLocalInteligacaoComputadoresController::class, 'register']);
        Route::post('/equipamentos-usados-alunos-acesso/registrar', [EquipamentosUsadosAlunosAcessoController::class, 'register']);
        Route::post('/profissionais-infraestrutura/registrar', [InfraestruturaProfissionaisController::class, 'register']);
        Route::post('/instrumentos-materiais-pedagogicos/registrar', [InstrumentosMateriaisPedagogicosController::class, 'register']);
        Route::post('/linguas-ensino/registrar', [LinguasEnsinoController::class, 'register']);
        Route::post('/sistema-cotas/registrar', [SistemaCotasController::class, 'register']);
        Route::post('/integracao-comunidade/registrar', [IntegracaoComunidadeController::class, 'register']);
        Route::post('/orgaos-colegiados/registrar', [OrgaosColegiadosController::class, 'register']);
        Route::post('/formas-desenvolvimento-educacao-ambiental/registrar', [FormasDesenvolvimentoEducacaoAmbientalController::class, 'register']);
    });
    Route::prefix('turmas')->group(function () {
        route::post('create', [TurmaController::class, 'register']);
        route::post('update/{id}', [TurmaController::class, 'update']);
        route::delete('delete/{id}', [TurmaController::class, 'destroy']);
        route::get('/{id}', [TurmaController::class, 'show']);
    });
})->middleware('auth:pessoas');
