<?php

namespace App\Repositories;

use App\Models\User;

class EloquentUserRepository implements UserRepositoryInterface {
    public function findById(int $userId): ?User {
        return User::find($userId);
    }

    public function create(array $data): ?User {
        return User::create($data);
    }

    public function update(User $user, array $data): ?User {
        $user->fill($data);
        $user->save();

        return $user;
    }

    public function delete(int $userId): ?bool {
        return User::destroy($userId);
    }
}
