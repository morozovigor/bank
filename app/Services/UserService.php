<?php

namespace App\Services;

use App\DTO\UpdateUserDTO;
use App\Exceptions\UserNotFoundException;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface {
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function updateUser(User $user, UpdateUserDTO $dto): User {
        if ($dto->name) {
            $user->name = $dto->name;
        }

        if ($dto->email) {
            $user->email = $dto->email;
        }

        if ($dto->age) {
            $user->age = $dto->age;
        }

        return $this->userRepository->update($user);
    }
}