<?php

namespace App\DTO;

class UpdateUserDTO {
    public function __construct(
        public ?string $name,
        public ?string $email,
        public ?int $age
    ) {}
}