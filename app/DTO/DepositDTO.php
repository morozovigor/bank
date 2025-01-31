<?php

namespace App\DTO;

class DepositDTO {
    public function __construct(
        public string $toUserId,
        public int $amount
    ) {}
}