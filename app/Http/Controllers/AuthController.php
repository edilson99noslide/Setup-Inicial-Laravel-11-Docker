<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;

class AuthController extends Controller {
    protected AuthService $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request) {
        $token = $this->authService->authenticate($request->validated());

        return response()->json([
            $this->authService->tokenResponse($token)
        ]);
    }
}
