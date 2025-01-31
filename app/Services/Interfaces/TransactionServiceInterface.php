<?php

namespace App\Services\Interfaces;

use App\DTO\DepositDTO;
use App\DTO\TransactionDTO;
use App\Models\Transaction;

interface TransactionServiceInterface {
    public function deposit(DepositDTO $dto): Transaction;
    public function transfer(TransactionDTO $dto): Transaction;
}