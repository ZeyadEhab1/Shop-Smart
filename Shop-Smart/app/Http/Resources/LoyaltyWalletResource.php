<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoyaltyWalletResource extends JsonResource
{
    public function toArray( $request): array
    {
        return [
            'id'=>$this->id,
            'user'=>[
                'id' => $this->user_id,
                'name' => $this->user->name,
                ],
            'balance' => $this->balance,
        ];
    }
}
