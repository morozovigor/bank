<?php

namespace App\Helpers;

use InvalidArgumentException;

class MoneyHelper
{
    private const ATOMIC_MULTIPLIER = 100;
    public static function toAtomic(float $amount): int
    {
        if (!is_numeric($amount)) {
            throw new InvalidArgumentException('Invalid money format');
        }

        $atomicAmount = (int) round((float) $amount * self::ATOMIC_MULTIPLIER);

        if ($atomicAmount < 0) {
            throw new InvalidArgumentException('Sum can not be negative');
        }

        return $atomicAmount;
    }

    public static function getFullAmount(int $cents): float
    {
        return $cents / self::ATOMIC_MULTIPLIER;
    }
}