<?php

namespace App\Services\Interfaces;

use App\DTO\UpdateUserDTO;
use App\Models\User;

interface UserServiceInterface {
    public function updateUser(User $user, UpdateUserDTO $dto): User;
}