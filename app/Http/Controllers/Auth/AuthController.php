<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    protected AuthService $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    /**
     * Responsável por autenticar um usuário
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request) {
        $token = $this->authService->authenticate($request->validated());

        return response()->json(
            $this->authService->tokenResponse($token)
        );
    }

    /**
     * Responsável por realizar um logout do usuário autenticado
     *
     * @return JsonResponse
     */
    public function logout() {
        auth('api')->logout();

        return response()->json(['message' => 'Logout realizado com sucesso!']);
    }

    /**
     * Responsável por retornar as informações do usuário autenticado
     *
     * @return JsonResponse
     */
    public function me(): JsonResponse {
        return response()->json(Auth::guard('api')->user());
    }

    /**
     * Responsável por gerar um novo token para o usuário autenticado
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse {
        $newToken = Auth::guard('api')->refresh();

        return response()->json([
            'access_token' => $newToken,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
