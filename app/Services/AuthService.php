<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthService {
    /**
     * Tenta autenticar e retorna o token JWT
     *
     * @param array $credentials
     * @return string
     *
     * @throw UnauthorizedHttpException se credenciais inválidas
     */
    public function authenticate(array $credentials): string {
        if(!$token = Auth::guard('api')->attempt($credentials)) {
            throw new UnauthorizedHttpException('Credenciais inválidas');
        }

        return $token;
    }

    /**
     * Formata a resposta do token JWT
     *
     * @param string $token
     * @return array
     */
    public function tokenResponse(string $token): array {
        return [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => Auth::guard('api')->factory()->getTTL() * 60,
        ];
    }
}
