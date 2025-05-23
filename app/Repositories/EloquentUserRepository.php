<?php

namespace App\Repositories;

use App\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{

    public function findById(int $id): ?User {
        return User::find($id);
    }

    public function update(User $user, array $data): ?User {
        $user->fill($data);
        $user->save();

        return $user;
    }

    public function create(array $data): ?User {
        return User::create($data);
    }
}
