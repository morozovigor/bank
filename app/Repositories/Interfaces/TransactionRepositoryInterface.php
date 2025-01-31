<?php

namespace App\Repositories\Interfaces;

use App\Models\Transaction;
use App\DTO\TransactionDTO;

interface TransactionRepositoryInterface {
    public function createTransaction(TransactionDTO $dto): Transaction;
}