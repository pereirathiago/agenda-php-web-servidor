<?php

use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CompromissoController;
use App\Http\Controllers\api\LocalController;
use App\Http\Controllers\api\OlaMundoController;
use Illuminate\Support\Facades\Route;

Route::get('/hello-world', [OlaMundoController::class, 'helloWorld']);

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', [AuthController::class, 'sessionUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/usuarios', [UserController::class, 'update']);
    Route::delete('/usuarios', [UserController::class, 'destroy']);
    Route::get('/usuarios', [UserController::class, 'index']);
    Route::get('/usuarios/{id}', [UserController::class, 'show']);

    Route::post('/compromissos', [CompromissoController::class, 'store']);
    Route::get('/compromissos', [CompromissoController::class, 'index']);
    Route::delete('/compromissos/{compromisso}', [CompromissoController::class, 'destroy']);
    Route::put('/compromissos/{compromisso}', [CompromissoController::class, 'update']);
    Route::get('/compromissos/{compromisso}', [CompromissoController::class, 'show']);

    Route::post('/locais', [LocalController::class, 'store']);
    Route::get('/locais', [LocalController::class, 'index']);
    Route::put('/locais', [LocalController::class, 'update']);
});

