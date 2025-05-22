<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register']);

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);
    Route::middleware('auth:api')->post('/refresh', [AuthController::class, 'refresh']);
    Route::middleware('auth:api')->get('/me', [AuthController::class, 'me']);
});

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});
