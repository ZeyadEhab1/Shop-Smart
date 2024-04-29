<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoyaltyWalletResource;
use App\Models\LoyaltyWallet;

class LoyaltyWalletController extends Controller
{
    public function __invoke(): LoyaltyWalletResource
    {

        $loyaltyWallet = LoyaltyWallet::firstOrCreate(['user_id'=> auth()->id()]);
        return new LoyaltyWalletResource($loyaltyWallet);

    }
}
