<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
    public function findById(string $id): ?User {
        return User::where('id', $id)->lockForUpdate()->first();
    }

    public function update(User $user): User {
        $user->save();
        return $user;
    }
}