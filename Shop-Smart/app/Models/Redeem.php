<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Redeem extends Authenticatable {

	protected $fillable = array('loyalty_wallet_transaction_id', 'reward_id', 'product_id');

	public function transaction(): BelongsTo
    {
		return $this->belongsTo(LoyaltyWalletTransactionController::class);
	}

	public function reward(): BelongsTo
    {
		return $this->belongsTo(Reward::class);
	}

	public function product(): BelongsTo
    {
		return $this->belongsTo(Product::class);
	}

}
