<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoyaltyWalletResource;
use App\Models\LoyaltyWallet;

class LoyaltyWalletController extends Controller
{
    public function __invoke()
    {

        $loyaltyWallet = LoyaltyWallet::where('user_id', auth()->id())->first();

        if ($loyaltyWallet->balance == 0 || $loyaltyWallet->balance === null) {
            return response()->json(['message' => 'User have no points yet']);
        }
        return new LoyaltyWalletResource($loyaltyWallet);

    }
}
