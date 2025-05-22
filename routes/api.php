<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Login
Route::post('login', [AuthController::class, 'login']);

Route::post('/register', [RegisterController::class, 'register']);

// Rota para teste
Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});
