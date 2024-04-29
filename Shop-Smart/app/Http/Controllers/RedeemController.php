<?php

namespace App\Http\Controllers;

use App\Http\Requests\RewardRequest;
use App\Http\Resources\RedeemResource;
use App\Models\Reward;
use App\Models\Redeem;
use App\Models\LoyaltyWallet;
use App\Models\LoyaltyWalletTransaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class RedeemController extends Controller
{
    public function __invoke(RewardRequest $request): RedeemResource|JsonResponse
    {
        $reward = Reward::find($request->reward_id);
        $userId = $request->user()->id;
        $wallet = LoyaltyWallet::where('user_id', $userId)->first();

        if ($wallet->balance < $reward->points) {
            return response()->json(['message' => 'You do not have enough points to redeem this reward.'], 403);
        }

        DB::beginTransaction();
        try {
            $initialBalance = $wallet->balance;

            $wallet->decrement('balance', $reward->points);

            $transaction = LoyaltyWalletTransaction::create([
                'loyalty_wallet_id' => $wallet->id,
                'balance_before' => $initialBalance,
                'amount' => $reward->points,
                'type' => 'down',
                'balance_after' => $wallet->balance,
                'description' => 'Redeemed reward: ' . $reward->name
            ]);

            $redeemRecord = Redeem::create([
                'user_id' => $userId,
                'reward_id' => $reward->id,
                'loyalty_wallet_transaction_id' => $transaction->id

            ]);

            DB::commit();

            return new RedeemResource($redeemRecord->load('user', 'reward','transaction'));
        }
        catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
        }
    }
}
