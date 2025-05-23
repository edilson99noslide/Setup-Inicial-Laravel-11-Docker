<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface {
    public function findById(int $id): ?User;
    public function update(User $user, array $data): ?User;
    public function create(array $data): ?User;
    public function delete(int $userId): ?bool;
}
