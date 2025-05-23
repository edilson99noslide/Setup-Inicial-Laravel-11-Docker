<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\UseCases\User\CreateUserUseCase;
use App\UseCases\User\UpdateUserUseCase;
use Illuminate\Http\JsonResponse;

class UserController extends Controller {
    public function __construct(
        private UpdateUserUseCase $updateUserUseCase,
        private CreateUserUseCase $createUserUseCase,
    ) {}

    /**
     * Responsável por cadastrar um usuário
     *
     * @param CreateUserRequest $request
     * @return JsonResponse
     */
    public function store(CreateUserRequest $request): JsonResponse {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        $user = $this->createUserUseCase->handle($data);

        return response()->json([
            'success' => true,
            'message' => 'Usuário criado com sucesso!',
            'data' => $user
        ], 201);
    }

    /**
     * Responsável por atualizar as informações de um usuário
     *
     * @param UpdateUserRequest $request
     * @param int $userId
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request, int $userId): JsonResponse {
        $user = $this->updateUserUseCase->handle($userId, $request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Usuário atualizado com sucesso.',
            'data' => $user,
        ]);
    }
}
