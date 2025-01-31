<?php

namespace App\DTO;

class TransactionDTO {
    public function __construct(
        public string $fromUserId,
        public string $toUserId,
        public int $amount
    ) {}
}