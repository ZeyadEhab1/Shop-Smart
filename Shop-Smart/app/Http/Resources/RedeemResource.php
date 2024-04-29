<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RedeemResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'user' => new UserResource($this->user),
            'reward' => new RewardResource($this->reward),
            'transaction'=> new LoyaltyWalletTransactionsResource($this->transaction)
        ];
    }
}
