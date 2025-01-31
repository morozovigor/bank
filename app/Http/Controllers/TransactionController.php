<?php

namespace App\Http\Controllers;

use App\DTO\DepositDTO;
use App\DTO\TransactionDTO;
use App\Helpers\MoneyHelper;
use App\Http\Requests\DepositRequest;
use App\Http\Requests\TransferRequest;
use App\Http\Resources\TransactionResource;
use App\Models\User;
use App\Services\Interfaces\TransactionServiceInterface;

class TransactionController extends Controller {
    public function __construct(
        private TransactionServiceInterface $transactionService
    ) {}

    public function deposit(DepositRequest $request, User $user): TransactionResource
    {
        $dto = new DepositDTO(
            $user->id,
            MoneyHelper::toAtomic($request->amount)
        );

        $transaction = $this->transactionService->deposit($dto);
        return new TransactionResource($transaction);
    }

    public function transfer(TransferRequest $request): TransactionResource
    {
        $dto = new TransactionDTO(
            $request->from_user_id,
            $request->to_user_id,
            MoneyHelper::toAtomic($request->amount)
        );

        $transaction = $this->transactionService->transfer($dto);
        return new TransactionResource($transaction);
    }
}
