<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray($request): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];

        if ($this->relationLoaded('address')) {
            $data['address'] = new AddressResource($this->address);
        }
        if ($this->relationLoaded('purchases')) {
            $data['purchases'] = PurchaseResource::collection($this->purchases);
        }
        if ($this->relationLoaded('loyaltyWallet')) {
            $data['loyalty_wallet'] = new LoyaltyWalletResource($this->loyaltyWallet);
        }

        return $data;

    }
}
