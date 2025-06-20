<?php

use App\Http\Controllers\Secretaria\SecretariaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/secretaria')->group(function () {
    Route::post('/register', [SecretariaController::class, 'register']);
    Route::post('/login', [SecretariaController::class, 'login']);

    Route::get('/{id}', [SecretariaController::class, 'show']);
});
