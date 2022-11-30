<?php

use App\Http\Controllers\Api\DepartamentoController;
use App\Http\Controllers\Api\SetorController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/departamento', [DepartamentoController::class, 'index']);
    Route::get('/departamento/{id}', [DepartamentoController::class, 'show']);

    Route::get('/setor', [SetorController::class, 'index']);
    Route::get('/setor/{id}', [SetorController::class, 'show']);

    Route::get('/usuarios', [UserController::class, 'index']);
    Route::get('/usuarios/{id}', [UserController::class, 'show']);
});