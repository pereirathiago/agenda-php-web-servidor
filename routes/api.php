<?php

use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\AuthController;
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
});

