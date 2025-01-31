<?php

namespace App\Http\Controllers;

use App\DTO\UpdateUserDTO;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;

class UserController extends Controller
{
    public function __construct(
        private UserServiceInterface $userService
    ) {}

    public function update(UpdateUserRequest $request, User $user): UserResource
    {
        $dto = new UpdateUserDTO(
            $request->name,
            $request->email,
            $request->age
        );

        $updatedUser = $this->userService->updateUser($user, $dto);
        return new UserResource($updatedUser);
    }
}
