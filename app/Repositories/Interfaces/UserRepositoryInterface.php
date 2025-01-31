<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface {
    public function findById(string $id): ?User;
    public function update(User $user): User;
}