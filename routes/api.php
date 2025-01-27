<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\OlaMundoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/hello-world', [OlaMundoController::class, 'helloWorld']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

