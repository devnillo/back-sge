<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EscolaController;

Route::prefix('/escolas')->group(function () {
    // Route::get('/{id}', [EscolaController::class, 'show']);
    // Route::put('/{id}', [EscolaController::class, 'update']);
    // Route::delete('/{id}', [EscolaController::class, 'destroy']);
    Route::post('/register', [EscolaController::class, 'register']);
    Route::get('/all/{id}', [EscolaController::class, 'all']);
    Route::get('/{id}', [EscolaController::class, 'show']);
    Route::put('/{id}', [EscolaController::class, 'update']);
});
?>
