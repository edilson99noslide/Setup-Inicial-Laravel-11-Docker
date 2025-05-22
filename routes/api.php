<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Login
Route::post('login', [AuthController::class, 'login']);

// Rota para teste
Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});
