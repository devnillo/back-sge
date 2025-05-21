<?php

use App\Http\Controllers\SecretaryController;
use App\Models\Secretary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/secretary')->group(function () {
    Route::post('/register', [SecretaryController::class, 'register']);

    Route::get('/{id}', [SecretaryController::class, 'show']);
});
