<?php

namespace App\Services;

use App\Models\Reward;
use App\Models\Redeem;
use App\Models\LoyaltyWallet;
use App\Models\LoyaltyWalletTransaction;
use Illuminate\Support\Facades\DB;

class RedeemService
{
    public function redeemReward(int $userId, int $rewardId)
    {
        $reward = Reward::find($rewardId);
        $wallet = LoyaltyWallet::where('user_id', $userId)->first();

        if ($wallet->balance < $reward->points) {
            return ['error' => 'You do not have enough points to redeem this reward.', 'status' => 403];
        }

        DB::beginTransaction();
        try {
            $initialBalance = $wallet->balance;

            $wallet->decrement('balance', $reward->points);

            $transaction = LoyaltyWalletTransaction::create([
                'loyalty_wallet_id' => $wallet->id,
                'balance_before' => $initialBalance,
                'amount' => -$reward->points,
                'type' => 'down',
                'balance_after' => $wallet->balance,
                'description' => 'Redeemed reward: ' . $reward->name
            ]);

            $redeemRecord = Redeem::create([
                'user_id' => $userId,
                'reward_id' => $rewardId,
                'loyalty_wallet_transaction_id' => $transaction->id
            ]);

            DB::commit();

            return ['redeemRecord' => $redeemRecord, 'status' => 200];
        } catch (\Exception $e) {
            DB::rollback();
            return ['error' => $e->getMessage(), 'status' => 500];
        }
    }
}
