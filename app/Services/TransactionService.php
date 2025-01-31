<?php
namespace App\Services;

use App\DTO\DepositDTO;
use App\DTO\TransactionDTO;
use App\Exceptions\InsufficientAmountException;
use App\Exceptions\UserNotFoundException;
use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\TransactionServiceInterface;
use Illuminate\Support\Facades\DB;

class TransactionService implements TransactionServiceInterface {
    public function __construct(
        private TransactionRepositoryInterface $transactionRepository,
        private UserRepositoryInterface $userRepository
    ) {}

    public function deposit(DepositDTO $dto): Transaction {
        return DB::transaction(function () use ($dto) {
            $user = $this->userRepository->findById($dto->toUserId);
            if (!$user) {
                throw new UserNotFoundException();
            }

            $user->balance += $dto->amount;
            $this->userRepository->update($user);

            return $this->transactionRepository->createTransaction(
                new TransactionDTO($user->id, $user->id, $dto->amount)
            );
        });
    }

    public function transfer(TransactionDTO $dto): Transaction {
        return DB::transaction(function () use ($dto) {
            $fromUser = $this->userRepository->findById($dto->fromUserId);
            $toUser = $this->userRepository->findById($dto->toUserId);

            if (!$fromUser || !$toUser) {
                throw new UserNotFoundException();
            }

            if ($fromUser->balance < $dto->amount) {
                throw new InsufficientAmountException();
            }

            $fromUser->balance -= $dto->amount;
            $toUser->balance += $dto->amount;

            $this->userRepository->update($fromUser);
            $this->userRepository->update($toUser);

            return $this->transactionRepository->createTransaction($dto);
        });
    }
}