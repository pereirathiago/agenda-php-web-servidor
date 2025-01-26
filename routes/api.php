<?php

use App\Http\Controllers\OlaMundoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello-world', [OlaMundoController::class, 'helloWorld']);
