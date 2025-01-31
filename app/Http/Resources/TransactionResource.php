<?php

namespace App\Http\Resources;

use App\Helpers\MoneyHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'from_user' => $this->from_user_id,
            'to_user' => $this->to_user_id,
            'amount' => MoneyHelper::getFullAmount($this->amount)
        ];
    }
}
