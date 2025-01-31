<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\DTO\TransactionDTO;
use App\Repositories\Interfaces\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface {
    public function createTransaction(TransactionDTO $dto): Transaction {
        return Transaction::create([
            'from_user_id' => $dto->fromUserId,
            'to_user_id' => $dto->toUserId,
            'amount' => $dto->amount,
        ]);
    }
}